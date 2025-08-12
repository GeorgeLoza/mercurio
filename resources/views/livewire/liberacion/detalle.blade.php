<div>
  <h1 class="font-bold uppercase">Liberación</h1>
  <p><span class="font-bold">ORP:</span> {{ $liberacion->orp->codigo }}</p>

  @if($liberacion->detalles->count())
  <table class="w-full text-xs border-collapse">
    <thead class="bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-400 text-center">
      <tr>
        <th class="p-1 border">Cabezal</th>
        <th class="p-1 border">Hora</th>
        <th class="p-1 border">Peso</th>
        <th class="p-1 border">Temp</th>
        <th class="p-1 border">pH</th>
        <th class="p-1 border">Brix</th>
        <th class="p-1 border">Acidez</th>
        <th class="p-1 border">Viscosidad</th>
        <th class="p-1 border">Color</th>
        <th class="p-1 border">Olor</th>
        <th class="p-1 border">Sabor</th>
      </tr>
    </thead>
    <tbody>
      @foreach($liberacion->detalles as $detalle)
      <tr wire:key="detalle-{{ $detalle->id }}">
        {{-- Origen_id --}}
        <td class="p-1 border">
          <select
            data-row="{{ $detalle->id }}"
            data-field="origen_id"
            class="cell-input w-full p-1 border rounded text-xs"
            wire:ignore
          >
            @foreach($origenes as $o)
              <option value="{{ $o->id }}" @selected($detalle->origen_id == $o->id)>{{ $o->alias }}</option>
            @endforeach
          </select>
        </td>
        {{-- Hora --}}
        <td class="p-1 border">
          <input
            data-row="{{ $detalle->id }}"
            data-field="hora_sachet"
            type="time"
            class="cell-input w-full p-1 border rounded text-xs"
            value="{{ $detalle->hora_sachet }}"
            wire:ignore
          />
        </td>
        {{-- Numéricos --}}
        @foreach(['peso','temperatura','ph','brix','acidez','viscosidad'] as $f)
        <td class="p-1 border">
          <input
            data-row="{{ $detalle->id }}"
            data-field="{{ $f }}"
            type="number"
            step="0.01"
            class="cell-input w-full p-1 border rounded text-xs"
            value="{{ $detalle->$f }}"
            wire:ignore
          />
        </td>
        @endforeach
        {{-- Booleanos --}}
        @foreach(['color','olor','sabor'] as $f)
        <td class="p-1 border text-center">
          <input
            data-row="{{ $detalle->id }}"
            data-field="{{ $f }}"
            type="checkbox"
            class="cell-input"
            @checked($detalle->$f)
            wire:ignore
          />
        </td>
        @endforeach
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
    <p class="text-gray-500">No hay detalles registrados.</p>
  @endif
</div>

@script
<script>
document.addEventListener('livewire:load', () => {
  const fields = [
    'origen_id','hora_sachet','peso','temperatura','ph',
    'brix','acidez','viscosidad','color','olor','sabor'
  ];

  let active = { row: null, field: null };

  function focusFirst() {
    const first = document.querySelector('.cell-input');
    if (first) { first.focus(); updateActive(first); }
  }

  function updateActive(el) {
    active.row = parseInt(el.dataset.row);
    active.field = el.dataset.field;
  }

  function saveCell(el) {
    const { row, field } = active;
    let val = el.type==='checkbox' ? (el.checked?1:0) : el.value;
    Livewire.emit('editCell', row, field, val);
    Livewire.emit('saveCell');
  }

  function move(dir) {
    const rows = Array.from(document.querySelectorAll('tr[wire\\:key^="detalle-"]'));
    const ids = rows.map(r => parseInt(r.getAttribute('wire:key').split('-')[1]));
    const ri = ids.indexOf(active.row), ci = fields.indexOf(active.field);
    let nr=active.row, nf=active.field;

    if(dir==='left' && ci>0) nf=fields[ci-1];
    else if(dir==='right'&&ci<fields.length-1) nf=fields[ci+1];
    else if(dir==='up')    nr=ids[(ri-1+ids.length)%ids.length];
    else if(dir==='down')  nr=ids[(ri+1)%ids.length];

    const sel = `.cell-input[data-row="${nr}"][data-field="${nf}"]`;
    const nxt = document.querySelector(sel);
    if(nxt) setTimeout(()=>{ nxt.focus(); updateActive(nxt); },50);
  }

  document.addEventListener('keydown', e=>{
    const el = document.activeElement;
    if(!el.classList.contains('cell-input')) return;

    switch(e.key) {
      case 'Enter':
        e.preventDefault(); saveCell(el); move('right'); break;
      case '/': e.preventDefault(); saveCell(el); move('left');  break;
      case '*': e.preventDefault(); saveCell(el); move('right'); break;
      case '-': e.preventDefault(); saveCell(el); move('up');    break;
      case '+': e.preventDefault(); saveCell(el); move('down');  break;
    }
  });

  focusFirst();
});
</script>
@endscript
