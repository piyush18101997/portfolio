<?php

/* * * BEGIN GEN FUNCTIONS * */

function intFmt($str) {
    return number_format($str, 0);
}

;

function usd($str) {
    return number_format($str, 2);
}

;

function toDate($time) {
    return date('Y-m-d H:i:s', $time);
}

//returns date formatted for mysql entry

function niceDate($time) {
    return date('M d, Y h:i a', strtotime($time)) . " ";
}

function dateOnly($time) {
    return date('M d, Y', strtotime($time));
}

function monthYear($time) {
    return date('M / Y', strtotime($time));
}

function niceDateNoYear($time) {
    return date('M d, h:i a', strtotime($time));
}

function niceDateNoYear_utc($utc) {
    return date('M d, h:i a', $utc);
}

function ago($m) { //pass in minutes  ago value
    if ($m <= 90)
        return round($m) . ' min. ago';
    if ($m <= (60 * 2))
        return 'less than 2 hrs ago';
    if ($m <= (60 * 2 + 30))
        return 'about 2 hrs ago';
    if ($m <= (60 * 24))
        return 'about ' . round($m / 60) . ' hrs ago';

    $dayCnt = round($m / 60 / 24);
    if ($dayCnt > 1)
        return $dayCnt . ' days ago';
    else
        return $dayCnt . ' day ago';
}

function daysAgo($numOfDays, $roundDay = false) { //returns a unix timestamp of $numOfDays ago from now
    if ($roundDay) {
        $now = time();
        $arr = getdate($now);
        return ( $now - (60 * 60 * 24 * $numOfDays ) - ($arr["hours"] * 60 * 60 ) - ($arr["minutes"] * 60 ) - $arr["seconds"] );
    }
    return time() - ( 60 * 60 * 24 * $numOfDays );
}

function oi($ob, $key, $default_value = null) {
    if (!is_object($ob))
        return $default_value;
    foreach ($ob as $k => $v)
        if ($k == $key)
            return $v;
    return $default_value;
}

function prop_exists($ob, $key) {
    foreach ($ob as $k => $v)
        if ($k == $key)
            return true;
    return false;
}

function ai($array, $key, $default_value = null) {
    return is_array($array) ? ( array_key_exists($key, $array) ? $array[$key] : $default_value) : $default_value;
}

function si(&$someVar, $returnIfNotSet = null) {
    if (isset($someVar))
        return $someVar;
    return $returnIfNotSet;
}

function validInt($str) {
    if (preg_match("/[^0-9]/", $str))
        return false;
    return true;
}

function validFloat($str) {
    if (preg_match("/[^0-9\.]/", $str))
        return false;
    return true;
}

function deleteAt(&$arr, $i) {
    array_splice($arr, $i, 1);
    return $arr;
}

function cleanSpaces($str) {
    $str = preg_replace("/  */", " ", $str);
    $str = preg_replace("/\r/", "\n", $str);
    $str = preg_replace("/\n\n*/", "\n", $str);
    if (substr($str, 0, 1) == "\n")
        $str = substr($str, 1);
    if (substr($str, -1, 1) == "\n")
        $str = substr($str, 0, strlen($str) - 1);
    return $str;
}

function trimWord($str, $max) {
    if (strlen($str) < $max)
        return $str;
    $a = substr($str, 0, $max - 1);
    //echo "\ntrimming: $str";
    $b = trimWord(substr($str, $max - 1), $max);
    return "$a- $b";
}

function trimWordLen($str, $max) { //cut words longer than max chars
    $str = cleanSpaces($str);
    $lines = explode("\n", $str);
    $ss = "";
    foreach ($lines as $i => $line) {
        $words = explode(" ", $line);
        foreach ($words as $j => $w)
            $ss.=trimWord($w, $max) . " ";
        $ss.="\n";
    }
    return cleanSpaces($ss);
}

function dateDiffYears($time1, $time2){
    /*
    $date_diff=strtotime($time2)-strtotime($time1);    
    return floor(($date_diff)/(60*60*24*365));
    */
        
    $yrs = 0;
    $time1 = date_create($time1);
    $time2 = date_create($time2);
    $diffArray = date_diff($time1, $time2);    
    $yrs = $diffArray->format('%R%y');    
    return $yrs * 1;
}

function dateDiff($time1, $time2, $precision = 6) {
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) {
        $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
        $time2 = strtotime($time2);
    }

    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
        $ttime = $time1;
        $time1 = $time2;
        $time2 = $ttime;
    }

    // Set up intervals and diffs arrays
    $intervals = array('year', 'month', 'day', 'hour', 'minute', 'second');
    $diffs = array();

    // Loop thru all intervals
    foreach ($intervals as $interval) {
        // Create temp time from time1 and interval
        $ttime = strtotime('+1 ' . $interval, $time1);
        // Set initial values
        $add = 1;
        $looped = 0;
        // Loop until temp time is smaller than time2
        while ($time2 >= $ttime) {
            // Create new temp time from time1 and interval
            $add++;
            $ttime = strtotime("+" . $add . " " . $interval, $time1);
            $looped++;
        }

        $time1 = strtotime("+" . $looped . " " . $interval, $time1);
        $diffs[$interval] = $looped;
    }

    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
        // Break if we have needed precission
        if ($count >= $precision) {
            break;
        }
        // Add value and interval 
        // if value is bigger than 0
        if ($value > 0) {
            // Add s if value is not 1
            if ($value != 1) {
                $interval .= "s";
            }
            // Add value and interval to times array
            $times[] = $value . " " . $interval;
            $count++;
        }
    }

    // Return string with times
    return implode(", ", $times);
}

class EmailHandler {

    public $subject, $body, $to;

    public function __construct($subject = '', $body = '', $from = "rie@twinmed.com") {
        $hdr = "From: $from\r\n";
        $hdr.="Reply-To: $from\r\n";
        $hdr.="X-Mailer: PHP/" . phpversion();
        $this->hdr = $hdr;
        $this->subject = $subject;
        $this->body = $body;
        $this->from = $from;
    }

    public function useHTML() {
        $hdr = 'MIME-Version: 1.0' . "\r\n";
        $hdr.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $hdr = "From: $this->from\r\n";
        $hdr.="Reply-To: $this->from\r\n";
        $hdr.="X-Mailer: PHP/" . phpversion();
        $this->hdr = $hdr;
    }

    public function sendToActioner($subject = null, $body = null) {
        global $global_acl;
        if ($subject)
            $this->subject = $subject;
        if ($body)
            $this->body = $body;
        $this->to = $global_acl->get_email();
        return $this->send();
    }

    public function sendToUser($userID, $subject = null, $body = null) {
        global $global_acl;
        if ($subject)
            $this->subject = $subject;
        if ($body)
            $this->body = $body;
        $this->to = $global_acl->get_email($userID);
        return $this->send();
    }

    public function send() {
        if (mail($this->to, $this->subject, $this->body, $this->hdr))
            return true;
        return false;
    }

}

function encryptCC($db, $ccNum, $ccv, $actioner_id) {
    //WE MUST ENCRYPT THE CC #, using the u_ID, ccv, and SECRET
    //generate the key
    $key = $ccv . PAINFULLY_SECRET . $actioner_id;
    return " AES_ENCRYPT('" . $ccNum . "', '" . $db->escape($key) . "') ";
}

function decryptCC($db, $ccv, $actioner_id) {
    //WE MUST ENCRYPT THE CC #, using the u_ID, ccv, and SECRET
    //generate the key
    $key = $ccv . PAINFULLY_SECRET . $actioner_id;
    return " AES_DECRYPT(uacc.number, '" . $db->escape($key) . "') ";
}

function ParseAddress($multiLineAddrStr) {
    //parse address lines
    $addrLines = explode("\n", $multiLineAddrStr);
    $addr1 = $addrLines[0];
    $addr2 = "";
    $addr3 = "";
    if (count($addrLines) > 1)
        $addr2 = $addrLines[1];
    //merge all lines after line 2 into 1 line
    if (count($addrLines) > 2)
        for ($i = 2; $i < count($addrLines); $i++)
            $addr3.=$addrLines[$i];

    return array($addr1, $addr2, $addr3);
}

function getBrowser() {

    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('|MSIE ([0-9].[0-9]{1,2})|', $useragent, $matched)) {
        $browser_version = $matched[1];
        $browser = 'IE';
    } elseif (preg_match('|Opera ([0-9].[0-9]{1,2})|', $useragent, $matched)) {
        $browser_version = $matched[1];
        $browser = 'Opera';
    } elseif (preg_match('|Firefox/([0-9\.]+)|', $useragent, $matched)) {
        $browser_version = $matched[1];
        $browser = 'Firefox';
    } elseif (preg_match('|Chrome/([0-9\.]+)|', $useragent, $matched)) {
        $browser_version = $matched[1];
        $browser = 'Chrome';
    } elseif (preg_match('|Safari/([0-9\.]+)|', $useragent, $matched)) {
        $browser_version = $matched[1];
        $browser = 'Safari';
    } else {
        // browser not recognized!
        $browser_version = 0;
        $browser = 'other';
    }

    return array($browser, $browser_version, $useragent);
}

function padPhone($str) {
    $str = trim($str);

    $str = preg_replace('/[^0-9]/', '', $str);
    if (substr($str, 0, 1) == "1") {
        $str = substr($str, 1, strlen($str) - 1);
    }

    $str = str_pad($str, 14, "0", STR_PAD_RIGHT);

    return $str;
}

function removeSpecialChars($str) {
    $str = preg_replace('/[^a-zA-Z0-9"-%&@\'\=\-\/;:(),{}_ %\[\]\.\(\)]/s', '', htmlentities($str));
    return $str;
}

function cleanup_name($param) {
    $patterns = array();
    $replacements = array();
    $patterns[0] = '/Mr\s\./'; // as in "Mr .Ram"
    $replacements[0] = 'Mr. ';
    $patterns[1] = '/Mr\.([\S])/'; //as in "Mr.Ram"
    $replacements[1] = 'Mr. $1';
    $patterns[2] = '/Md\.([\S])/'; // as in "Md.Akram"
    $replacements[2] = 'Md. $1';
    $patterns[3] = '/\s\./'; // as in "Dr ."
    $replacements[3] = '. $1';

    return preg_replace($patterns, $replacements, $param);
}

function num2inr($num) {
    $explrestunits = '';
    if (strlen($num) > 3) {
        $lastthree = substr($num, strlen($num) - 3, strlen($num));
        $restunits = substr($num, 0, strlen($num) - 3); // extracts the last three digits			
        $restunits = (strlen($restunits) % 2 == 1) ? "0" . $restunits : $restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for ($i = 0; $i < sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end	
            if ($i == 0) {
                $explrestunits .= (int) $expunit[$i] . ","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i] . ",";
            }
        }
        $thecash = $explrestunits . $lastthree;
    } else {
        $thecash = $num;
    }

    return $thecash; // writes the final format where $currency is the currency symbol.
}

?>
