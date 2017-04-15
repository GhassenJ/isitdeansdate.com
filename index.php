<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Is it Dean's Date?</title>

    <!-- standard meta -->
    <meta name="description" content="Is it currently Dean's Date at Princeton University?" />
    <meta name="keywords" content="Princeton, Dean's, Date, grade, deflation, weather, machine" />

    <!-- Facebook meta -->
    <meta property="og:title" content="Is it Dean's Date?" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://isitdeansdate.com/" />
    <meta property="og:image" content="http://isitdeansdate.com/fb_img.jpg" />
    <meta property="og:description" content="Is it currently Dean's Date at Princeton University?" />

    <link rel="stylesheet" href="site.css" />
</head>
<body>
    <?php
        // List of all Dean's Dates, from https://registrar.princeton.edu/academic-calendar/
        $deans_dates = array(
            '2013-01-15',
            '2013-05-14',
            '2014-01-14',
            '2014-05-13',
            '2015-01-13',
            '2015-05-12',
            '2016-01-12',
            '2016-05-10',
            '2017-01-17',
            '2017-05-17',
            '2018-01-16',
            '2018-05-15',
            '2019-01-15',
            '2019-05-14',
            '2020-01-14',
            '2020-05-12',
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
            echo '<div id=wow title="Lucas needs to add more dates! Contact him at {lucasjcmayer} at {gmail}.">';
            echo '<p id="rinceton">:(</p>';
            echo '<p id="lebeian">Someone tell Lucas!</p>';
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
            $sub_text = 'Dean\'s Date is ';
            if ($diff == 1) {
                $sub_text .= 'tomorrow!';
            } elseif ($diff == 0) {
                $sub_text .= 'TODAY!';
            } else {
                $sub_text .= 'in ' . $diff . ' days...';
            }

            echo '<div id=wow title="' . $deans_date->format('l\, F jS\, Y') . '">';
            echo '<p id="rinceton">' . $main_text . '</p>';
            echo '<p id="lebeian">' . $sub_text . '</p>';
            echo '</div>';
        }
    ?>

    <!-- Facebook "Like" button -->
    <iframe id="yolo" src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fisitdeansdate.com%2F&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;font=tahoma&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>

    <!-- Google Analytics -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-40931103-1', 'auto');
	  ga('send', 'pageview');
	</script>
</body>
</html>
