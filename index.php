<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Is it the NIPS due date?</title>

    <!-- standard meta -->
    <meta name="description" content="Is today the deadline for NIPS?" />
    <meta name="keywords" content="NIPS, Neural Information Processing Systems, Conference, Deadline, date, machine, learning, deep, Lecun" />

    <!-- Facebook meta -->
    <meta property="og:title" content="Is it the NIPS due date?" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://isitnipsdue.date/" />
    <meta property="og:image" content="http://isitnipsdue.date/fb_img.jpg" />
    <meta property="og:description" content="Is today the deadline for NIPS?" />

    <link rel="stylesheet" href="site.css" />
</head>
<body>
    <?php
        // List of all Dean's Dates, from https://registrar.princeton.edu/academic-calendar/
        $deans_dates = array(
            '2017-05-19',
        );

        // Current time in Princeton, New Jersey
        date_default_timezone_set('America/New_York');

        // Get current date
        $_now = new DateTime();
        $_year = $_now->format('Y');
        $_month = $_now->format('m');
        $_day = $_now->format('d');
        $now = new DateTime($_year . '-' . $_month . '-' . $_day);

        // Get upcoming deans date
        foreach ($deans_dates as $datestring) {
            if (new DateTime($datestring) >= $now) {
                $deans_date = new DateTime($datestring);
                break;
            }
        }

        // Error
        if (is_null($deans_date)) {
            echo '<div id=wow title="Ghassen needs to add more dates! Contact him at {ghassouna} at {gmail}.">';
            echo '<p id="rinceton">:(</p>';
            echo '<p id="lebeian">Someone tell Ghassen!</p>';
            echo '</div>';
        }

        // Success
        else {
            // Get difference in days between now and the upcoming dean's date
            $diff = ceil(($deans_date->format('U') - $now->format('U')) / (60 * 60 * 24));

            // Main text
            if ($diff == 0) {
                $main_text = 'YES';
            } else {
                $main_text = 'NO';
            }

            // Hover text
            $sub_text = 'NIPS\'s Deadline is ';
            if ($diff == 1) {
                $sub_text .= 'tomorrow!';
            } elseif ($diff == 0) {
                $sub_text .= 'TODAY!';
            } else {
		$karp_diff = $diff/3e-4
                $sub_text .= 'in ' . $diff . ' days...\n which is' . $karp_diff . '*KARPATHY constant';
            }
	

            echo '<div id=wow title="' . $deans_date->format('l\, F jS\, Y') . '">';
            echo '<p id="rinceton">' . $main_text . '</p>';
            echo '<p id="lebeian">' . $sub_text . '</p>';
            echo '</div>';
        }
    ?>
</body>
</html>
