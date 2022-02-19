<?php /** @noinspection MultiAssignmentUsageInspection */

use Shuchkin\SimpleXLSX;

require_once __DIR__.'./src/SimpleXLSX.php';

function readWord($filename) {
    if(file_exists($filename))
    {
        if(($fh = fopen($filename, 'r')) !== false ) 
        {
            $headers = fread($fh, 0xA00);
            $n1 = ( ord($headers[0x21C]) - 1 );
            $n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );
            $n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );
            $n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );
            $textLength = ($n1 + $n2 + $n3 + $n4);
            $extracted_plaintext = fread($fh, $textLength);
            $extracted_plaintext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$extracted_plaintext);
            return $extracted_plaintext;
        } else {
            return false;
        }
    } else {
        return false;
    }  
}

foreach (glob("*.*") as $filename) {

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if($ext == 'xlsx'){
        if ( $xlsx = SimpleXLSX::parse($filename)) {

                echo '<h2>'.$filename.'</h2>';
                echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';

                $dim = $xlsx->dimension();
                $cols = $dim[0];

                foreach ( $xlsx->rows() as $k => $r ) {
                    echo '<tr>';
                    for ( $i = 0; $i < $cols; $i ++ ) {
                        echo '<td>' . ( isset( $r[ $i ] ) ? $r[ $i ] : '&nbsp;' ) . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
        } else {
            echo SimpleXLSX::parseError();
        }

    } else if ($ext == 'doc') {

        echo '<h2>'.$filename.'</h2>';
        echo readWord($filename);

    } else if ( $ext == 'txt' ){

        echo '<h2>'.$filename.'</h2>';
        echo file_get_contents($filename);

    } else if ($ext == 'csv') {

        echo '<h2>'.$filename.'</h2>';
        echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';  
  
        $file = fopen("books.csv", "r");
        while (($data = fgetcsv($file)) !== false) {
            echo   '<tr>';
            foreach ($data as $i) {
                echo '<td>' . htmlspecialchars($i) . '</td>';
            }
            echo '</tr>';
        }
        fclose($file);
  
        echo '</table>';
    }
}


        











