@if ($micro->moh_lev2 >= 1000000)
    MNPC
@elseif ($micro->moh_lev2 < 1000000 && $micro->moh_lev2 >= 1)
    {{ $micro->moh_lev2 < 1
        ? $micro->moh_lev2 * 10 ** (strlen(floor($micro->moh_lev2)) - 1)
        : $micro->moh_lev2 / 10 ** (strlen(floor($micro->moh_lev2)) - 1) }}
    x 10<sup>{{ strlen(floor($micro->moh_lev2)) - 1 }}</sup>
@elseif ($micro->moh_lev2 === 0)
    < 1 x 10<sup>1</sup>
    @elseif (is_null($micro->moh_lev2))
        --
@endif
