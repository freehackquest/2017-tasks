<?php

//Fill an array of the $flags from the file in any convenient way

$chiptext="Itsjh jeoe hvw ihln^k^ wv noljcm vhg _\e[i\i`k xtikmzi| bpq Hymw cs yx{}}r}x{ jeoh {nyfj hmdnafYj yvre G[olcm ~npwp}t~|up h\bi\ yho \]]`Z`kli nyh}pkh EY][]fYk }{r|}rz~n _bgb[nl ikk}u{iv ?ji`^ x{zx{s n_ffom yho g[nncm nunvnw}~v Pba vnwnwj}r| ^`^lmZl ipmx ` twjwz|q{ jeoh g{izux sr Itsjh cr wyl{p|t je^d Uimkmvi{ pfq eqix obo^kkZ rmfl bh]c ku qeb ri|x n`q`i |twix cen ymjwj gq pq ^fhmbhg ymjwj gq ujfhj HjheZcY^hhZ ygvokt mdnpn uwwlxnz}{p} cr hvw pfq eqix _\e[i\i`k phj|spz anko Pu{lnly mqeo jvttvkv an]p cv ki`jk`hl\ sg{xoy Sr qrq afl]j\me shms ;_h_[h ~u}{rlrn| sr ipmx gb uxtgxk EY][]fYk ivsw dknph vnwnwj}r| _r ishukp{ klk nunvnw}~v _r shms Bgm^`^k qrq `e]i wyl{p|t ahep {}{kqxq| giffcm Hqfxx [jn_hn zgiozo kg[agkim cf fcnil[ |wzy}mv| mbo jvu|iph himnl[ shu af[]hlgk qrvnwjnx|";

function decode($keyw,$keyc,$chars,$word)
{
    global $flags;
    $k=ord($chars);
    if($flags[$keyw][$keyc]===true) {
        if ($keyw % 2) {
            $k += strlen($word);
            if ($k <= 126) {
                $chipword[$keyc] = chr($k);
            } else {
                $chipword[$keyc] = chr($k - strlen($word));
            }
        } else {
            $k -= strlen($word);
            if ($k >= 33) {
                $chipword[$keyc] = chr($k);
            } else {
                $chipword[$keyc] = chr($k + strlen($word));
            }
        }
    }
    else
    {
        $chipword[$keyc] = chr($k);
    }
    return $chipword[$keyc];

}

$array=str_word_count($chiptext,1,"|_\\`[{]^~}");
foreach ($array as $keyw=>$word)
{
    for($i=0;$i<strlen($word);$i++)
    {
        $chipword[$i]=decode($keyw,$i,$word[$i],$word);
    }
    @$goodtext.=implode("",$chipword)." ";
    unset($chipword);
}

echo $goodtext."\n";

