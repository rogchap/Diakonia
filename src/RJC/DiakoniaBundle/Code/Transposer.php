<?php

namespace RJC\DiakoniaBundle\Code;

class Transposer {

    private function shift_values($param, $number) {
        $param = \array_merge($param, $param);
        $param = \array_slice($param, $number, 12);

        return $param;
    }

    /**
     * C = 0, C#=1, D=2 and so on
     */
    public function transpose($key, $newKey, $song, $minor=false, $type='#'){
        $search = '`\b[A-G]{1,1}(#|b)?(m7|9|maj7|7|m|sus2|sus4|5)?(\/[A-G](#)?(b{1,1})?)?`';
        \preg_match_all($search, $song, $song_chords);
        $u = \array_unique($song_chords[0]);

        // Majors with sharps
        $notes = array('/(?<!\|)C(?!(\#|b))/',
            '/(?<!\|)(C#|Db)/',
            '/(?<!\|)D(?!(\#|b))/',
            '/(?<!\|)(D#|Eb)/',
            '/(?<!\|)E(?!(\#|b))/',
            '/(?<!\|)F(?!(\#|b))/',
            '/(?<!\|)(F#|Gb)/',
            '/(?<!\|)G(?!(\#|b))/',
            '/(?<!\|)(G#|Ab)/',
            '/(?<!\|)A(?!(\#|b))/',
            '/(?<!\|)(A#|Bb)/',
            '/(?<!\|)B(?!(\#|b))/');
        $notes = $this->shift_values($notes, $key);

        // Majors replace with sharps
        $sharps_replace = array('|C', '|C#', '|D','|D#', '|E','|F','|F#', '|G','|G#','|A','|A#', '|B');
        $sharps_replace = $this->shift_values($sharps_replace,$newKey);

        // Majors replace with flats
        $flats_replace = array('|C','|Db', '|D','|Eb', '|E','|F','|Gb', '|G','|Ab','|A','|Bb', '|B');
        $flats_replace = $this->shift_values($flats_replace,$newKey);

        // Minors
        $minors = array('/(?<!\|)C(?!(\#|b))/',
            '/(?<!\|)(C#|Db)/',
            '/(?<!\|)D(?!(\#|b))/',
            '/(?<!\|)(D#|Eb)/',
            '/(?<!\|)E(?!(#|b))/',
            '/(?<!\|)F(?!(\#|b))/',
            '/(?<!\|)(F#|Gb)/',
            '/(?<!\|)G(?!(\#|b))/',
            '/(?<!\|)(G#|Ab)/',
            '/(?<!\|)A(?!(\#|b))/',
            '/(?<!\|)(A#|Bb)/',
            '/(?<!\|)B(?!(\#|b))/');
        $minors = $this->shift_values($minors,$key);
        
        // Minors replace with sharps
        $minors_replace = array('|A','|A#', '|B','|C','|C#', '|D','|D#', '|E','|F','|F#', '|G','|G#');                
        $minors_replace = $this->shift_values($minors_replace,$newKey);

        // Minors replace with flats
        $minors_replace = array('|A','|Bb', '|B','|C','|Db', '|D','|Eb', '|E','|F','|Gb', '|G','|Ab');                
        $minors_replace = $this->shift_values($minors_replace,$newKey);

        if ($minor == true) {
            $new = preg_replace($minors, $minors_replace, $u);
        }
        else if ($type == 'b' | $newKey == '3') {
            $new = preg_replace($notes, $flats_replace, $u);
        }
        else {
            $new = preg_replace($notes, $sharps_replace, $u);
        }

        foreach ($u as $key => $value) {
            $u[$key] = '/\b(?<!\|)'. preg_quote($value, '/') .'\b/';
        }

        $new_song = preg_replace($u, $new, $song);
        $clean = str_replace('|', '', $new_song);

        return $clean;
    }

}
