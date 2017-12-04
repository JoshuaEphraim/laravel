<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="public/Template/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="public/Template/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="public/Template/css/jquery.rateit.css" />
    <link rel="stylesheet" type="text/css" href="public/Template/css/my.css" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" />
    <script type="text/javascript" src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="public/Template/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="public/Template/js/sitescript.js"></script>
    <script type="text/javascript" src="public/Template/js/sitescript_functions.js"></script>
    <script src="models/ammap/my/ammap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="models/ammap/my/ammap.css" type="text/css" media="all" />
    <script src="models/ammap/my/worldLow.js" type="text/javascript"></script>


    <script src="models/ammap/my/ammapSetings.js" type="text/javascript"></script>
    <title><?php echo $generator->getDomain(); ?></title>
    <script>
        d_id=<?php echo $generator->getDId(); ?>;
    </script>
    <script type="text/javascript">
        //<!--
        <?php echo $alexaMap; ?>
        traffic=<? echo $getTraffic->getTraffic();?>;
        tDates=<? echo $getTraffic->getTDates();?>;

    </script>

</head>
<body>
<div id="mask"></div>
<div id="container">
    <div id="header"><div class="inner"><div class="padder">
                <div class="lSide">
                    <a href="/index.php" class="logo"><?php echo ucfirst($printFirstElement); ?> Reviews</a>
                    <a href="#" class="trigger"><!--//--></a>
                    <div class="clear"><!--//--></div>
                </div>
                <div class="rSide">
                    <ul class="menu">
                        <li><a href="/index.php/directory">Directory</a></li>
                        <li><a href="/index.php/featured">Featured</a></li>
                        <li><a href="/index.php/blog">Blog</a></li>
                        <li><a href="/index.php/about">About</a></li>
                    </ul>
                </div>
                <div class="clear"><!--//--></div>
            </div></div></div>
    <div id="first"><div class="inner"><div class="padder">
                <div class="lSide"><div class="cSide">
                        <p class="caption"><?php echo $printFirstElement; ?> reviews <span><span id="rate_1"></span>/10</span></p>
                        <p>Our Short Review for <?php echo ucfirst($generator->getDomain()); ?>:  <?php echo $text_list[1]; ?></p>
                        <p><?php echo $header_text; ?></p>
                    </div></div>
                <div class="rSide">
                    <div class="element">
                        <span class="label">Trust<span>27%</span></span>
                        <div class="rating"><div style="width: 27%;"></div></div>
                    </div>
                    <div class="element">
                        <span class="label">Usability<span class="high">100%</span></span>
                        <div class="rating"><div style="width: 100%;"></div></div>
                    </div>
                    <div class="element">
                        <span class="label">Rating<span>43%</span></span>
                        <div class="rating"><div style="width: 43%;"></div></div>
                    </div>
                    <div class="element">
                        <span class="label">Reviews<span class="high">89%</span></span>
                        <div class="rating"><div style="width: 89%;"></div></div>
                    </div>
                    <div class="ratenow">
                        <a href="#" class="link">Rate Now</a>
                        <div class="rateit"></div>
                    </div>
                </div>
                <div class="clear"><!--//--></div>
            </div></div></div>
    <div id="second"><div class="inner">
            <div class="column">
                <a href="#"><img src="public/Template/img/<?php echo $generator->getDomain(); ?>.jpeg" alt="" /></a>
            </div>
            <div class="column positive">
                <span id="rate_2"></span>
                Positive reviews
            </div>
            <div class="column negative">
                <span id="rate_3"></span>
                Negative reviews
            </div>
            <div class="column" id="menu">
                <ul class="menu">
                    <li><span><a href="#review">Reviews</a></span></li>
                    <li><span><a href="#discussion">Discussion</a></span></li>
                    <li><span><a href="#information">More information</a></span></li>
                </ul>
            </div>
            <div class="clear"><!--//--></div>
        </div></div>
    <div id="third"><div class="inner"><div class="padder">
                <div class="lSide">
                    <p class="caption">Statistics</p>
                    <div id="chart" class="chart"></div>
                    <ul class="total">
                        <li><span style="font-size: 40px;"><?php echo $alexaRank[0][0]; ?></span>Alexa Rank</li>
                        <li><span style="font-size: 40px;"><?php echo $alexaRank[1][0]; ?></span><?php echo $alexaRank['dinamik']; ?></li>
                        <li><span style="font-size: 40px;"><?php echo $alexaRank[2][0]; ?></span>Regional US</li>
                    </ul>
                </div>
                <div class="rSide">
                    <div class="map">
                        <div class="visitsMap" style="width:100%; height:275px;" id="visitsMap" ></div>			</span>
                    </div>
                    <p class="caption">Most Visitors From</p>
                    <ul class="locations">
                    </ul>
                </div>
                <div class="clear"><!--//--></div>
            </div></div></div>
    <div class="comments"><div class="inner">
            <p class="caption">Latest Comments</p>



        </div></div>
    <div class="information" id="information"><div class="inner">
            <div class="column">
                <p class="caption">Whois</p>
                <?php
                    if(is_array($whois)) {
                        echo "<ul>";
                        foreach ($whois as $key => $value) {
                            if (!empty($value) && stripos($key, 'http') === false) {
                                echo "<li>";
                                echo "<span>" . $key . ":</span> " . $value;
                                echo "</li>";
                            }
                        }
                        echo "</ul>";
                    }
                    else
                    {
                        echo $whois;
                    }

                ?>
            </div>
            <div class="column">
                <p class="caption">Geo</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <ul>
                    <li>IPs: <?php echo (!empty($geo['geoplugin_request']))?$geo['geoplugin_request']:'Unknown'; ?></li>
                    <li>City: <?php echo (!empty($geo['geoplugin_city']))?$geo['geoplugin_city']:'Unknown'; ?></li>
                    <li>Country: <?php echo (!empty($geo['geoplugin_countryName']))?$geo['geoplugin_countryName']:'Unknown'; ?></li>
                    <li>State: <?php echo (!empty($geo['geoplugin_regionName']))?$geo['geoplugin_regionName']:'Unknown'; ?></li>
                    <li>Currency Code:  <?php echo (!empty($geo['geoplugin_currencyCode']))?$geo['geoplugin_currencyCode']:'Unknown'; ?></li>
                    <li>Currency Symbol: <?php echo (!empty($geo['geoplugin_currencySymbol']))?$geo['geoplugin_currencySymbol']:'Unknown'; ?></li>
                    </ul>
            </div>
            <div class="column">
                <p class="caption">Reverse IP / Whois</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <ul>
                    <li>IP:</li>
                <?php
                if(is_array($reverseIp)) {
                    foreach ($reverseIp as $value) {
                        echo '<li>' . $value . '</li>';
                    }
                }
                else{
                    echo '<li>' . $reverseIp . '</li>';
                }
                ?>
                </ul>
            </div>
            <div class="column">
                <p class="caption">Analytics</p>
                <p><?php echo $text_list[3]; ?></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            </div>
            <div class="clear"><!--//--></div>
        </div></div>
    <div class="white" id="review"><div class="inner"><div class="padder">
                <p class="caption">Reviews <a href="#" id="leave_review">Leave your review</a></p>
                <div class="clear"><!--//--></div>
                <div class="lSide">


                </div>
                <div class="rSide">

                </div>
                <div class="clear"><!--//--></div>
                <div id="hidden">
                </div>


                <div class="clear"><!--//--></div>
            </div></div></div>
    <div class="pink"><div class="inner"><div class="padder">
                <p class="caption"><?php echo ucfirst($domain); ?> Scam or Legit?</p>
                <p>Our Short Review for <?php echo ucfirst($domain); ?>: <?php echo $text_list[2]; ?></p>
                <p><?php echo $footer_text; ?></p>
            </div></div></div>
    <div class="white" id="discussion"><div class="inner"><div id="content" class="padder">
                <p class="caption">Discussion</p>
            </div></div></div>
    <div id="feedback"><div class="inner"><div class="padder">
                <p class="caption">Leave your Comment</p>
                <form id="comment_1" name="" method="" action="">
                    <input type="text" name="" value="" placeholder="Your Name" class="txt" />
                    <input type="text" name="" value="" placeholder="Your E-Mail" class="txt" />
                    <textarea name="" rows="8" placeholder="Your Comment" class="txt"></textarea>
                    <div class="ratenow">
                        <span>Rate Now</span>
                        <div class="rateit"></div>
                    </div>
                    <input type="submit" name="" value="Submit" class="btn" />
                </form>
            </div></div></div>

    <div id="footer"><div class="inner">
            <p>All Rights Reserved<br />Customer service is excellent. Very professional.</p>
        </div></div>
</div>
<div id="leave"><div class="inner"><div class="padder">
            <div id="leave_comment"><a  href="#">Close</a></div>
            <p class="caption">Leave your Review

            </p>
            <form id="comment_0" name="" method="" action="">
                <input type="text" name="" value="" placeholder="Your Name" class="txt" />
                <input type="text" name="" value="" placeholder="Your E-Mail" class="txt" />
                <textarea name="" rows="8" placeholder="Your Comment" class="txt"></textarea>
                <div class="ratenow">
                    <span>Rate Now</span>
                    <div class="rateit"></div>
                </div>
                <input type="submit" name="" value="Submit" class="btn" />
            </form>
        </div></div></div>
</body>
</html>
