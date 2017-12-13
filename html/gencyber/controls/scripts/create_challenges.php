<?php
session_start();
    if(!isset($_SESSION['id'])) {
            header("location: /login");
    }
else {
    $id = $_SESSION['id'];
    if ($id != 1337) {
        header("location: /gencyber");
    }
    else {
        $GLOBALS['id'] = $_SESSION["id"];
    }
}
?>
<html>
<body>
    <h1>Create challenges PHP script</h2>
    <p>
        The purpose of this script is to create/update a JSON file for the game containing the challenge descriptions, questions, and answers<br/>
        (all which the game retrieves and displays). You must modify this file 'create_challenges.php' to change it's values. Then go back here to <br/>
        run the script. Alternatively, you can run this script in your Linux server by running 'php <\thisfile\>.php' in Terminal<br/>
    </p>
    <?php
        $description[1] = "★★☆<br/>Back in the 1990s, Yahoo's search engine was the Internet king. Then Google came along.";
        $description[2] = "★★★<br/>It is a security best practice to have at least two user accounts on a computing system. One normal user account to perform day to day tasks such as browsing the Internet and another higher privilege account to perform administrative tasks such as installing applications. Then, if you happened to catch malware while browsing the Internet, that malware will only have rights to your computer system of that normal user account.";

        $description[3] = "★★★<br/>If this Security Principle is not implemented properly, someone might be able to gain access to a secured building through an adjoining building. The attacker could enter the unsecured building and then enter the secured building thru a backdoor from the unsecured building to the secured building.";

        $description[4] = "★☆☆<br/>There is a sculpture on campus which features representations of physical structures in the local neighborhood.";
        $description[5] = "★☆☆<br/>Wayfinding uses multiple methods to determine a location such as wind direction, stars, sunrises and sunsets, birds and debris in the ocean.";
        $description[6] = "★★☆<br/>This Cybersecurity First Principle relates to keeping all the resources a system needs to operate in a single self-contained component.";
        $description[7] = "★☆☆<br/>The Dewey Decimal System is an early form of this Cybersecurity First Principle.";

        $description[8] = "★★☆<br/>In the movie \"The Imitation Game\", after Allan Turing and his team cracked the German Enigma Machine, they had to ensure that not only the Germans did notknow that they had cracked the Enigma machine, but nearly the entire Allied Forces was not told that Enigma was cracked.";

        $description[9] = "★☆☆<br/>The concept of designing a system with discrete interchangeable sections which can be replaced without affecting the other sections";

        # C1
        $questions['1']['question']['1'] = "<br/>Which GenCyber First Principle did Google apply which helped it surpass Yahoo?";
        $questions['1']['question']['2'] = "<br/><a href=\"/gencyber/images/challenge1.bmp\"><img src=\"/gencyber/images/challenge1.bmp\" style=\"width: 100%; height: auto\" alt=\"Challenge 1\"></a><br/>";
        # C2
        $questions['2']['question']['1'] = "<br/>This is an example of which GenCyber First Principle?";
        $questions['2']['question']['2'] = "<br/><i>You might need to look back at this picture later on...</i><br/><br/><a href=\"/gencyber/images/challenge2.bmp\"><img src=\"/gencyber/images/challenge2.bmp\" style=\"width: 90%; height: auto\" alt=\"Challenge 2\"></a><br/>";
        # C3
        $questions['3']['question']['1'] = "<br/>Which GenCyber First Principle does this type of building fail to implement?";
        $questions['3']['question']['2'] = "<br/><a href=\"/gencyber/images/challenge3.bmp\"><img src=\"/gencyber/images/challenge3.bmp\" style=\"width: 78%; height: auto\" alt=\"Challenge 3\"></a><br/>";
        # C4
        $questions['4']['question']['1'] = "<br/>The sculpture represents this Cybersecurity First Principle.";
        $questions['4']['question']['2'] = "<br/>76deb2ac06bfc1320b5aadb52d856fca\n<br/>RmxhZzogVGhlIGRhdGUgb24gdGhlIHBsYXF1ZSBvZiB0aGUgc2N1bHB0dXJl";
        # C5
        $questions['5']['question']['1'] = "<br/>This is similar to a Cybersecurity First Principle which implements multiple tiers of security that an intruder would need to crack through.";
        $questions['5']['question']['2'] = "<br/><a href=\"/gencyber/images/challenge5.bmp\"><img src=\"/gencyber/images/challenge5.bmp\" style=\"width: 75%; height: auto\" alt=\"Challenge 5\"></a><br/>";
        # C6
        $questions['6']['question']['1'] = "<br/>Which Gencyber First Principle does this relate to?";
        $questions['6']['question']['2'] = "<br/><a href=\"/gencyber/images/challenge6.bmp\"><img src=\"/gencyber/images/challenge6.bmp\" style=\"width: 80%; height: auto\" alt=\"Challenge 6\"></a><br/>";
        # C7
        $questions['7']['question']['1'] = "<br/>Enter the Gencyber principle below";
        $questions['7']['question']['2'] = "<br/>RW50ZXIgdGhlIGJ1aWxkaW5nIG51bWJlciB3aGljaCB1c2VzIHRoaXMgc3lzdGVt";
        $questions['7']['question']['3'] = "<br/>YSAU: AL MIT RTCTB RTEODAS LBLMTD OL ZTOFU AFMOJWAMTR, LG AKT MITLT LBLMTDL YGWFR GWMLORT MIT ZWOSROFU";
        # C8
        $questions['8']['question']['1'] = "<br/>This is an example of which GenCyber First Principle?";
        $questions['8']['question']['2'] = "<br/>Salty Clue: fb04865bf7a2b15d7f79715059f954cf\n<br/>Locate a metal sign on the building referenced in the above cipher text whose title relates to broiling or barbecuing. There is an old map in the sign. Enter the name of the major street shown in the map.";
        $questions['8']['question']['3'] = "<br/>TG9jYXRlIGEgV2F0ZXIgTGlsbHkgY29udGFpbmVyIHdpdGggc21hbGwgZmlzaC4gIEZsYWcgaXMgdGhlIGJpcmQgbmV4dCB0byB0aGUgY29udGFpbmVyLg==";
        # C9
        $questions['9']['question']['1'] = "<br/>Which GenCyber First Prinicple does the above represent?";
        $questions['9']['question']['2'] = "<br/><a href=\"/gencyber/images/challenge9.bmp\"><img src=\"/gencyber/images/challenge9.bmp\" style=\"width: 82%%; height: auto\" alt=\"Challenge 9\"></a><br/>";

        $questions['1']['answer']['1'] = ["conceptuallysimple","simplicityofdesign"];
        $questions['1']['answer']['2'] = ["fern"];
        $questions['2']['answer']['1'] = ["leastprivilege"];
        $questions['2']['answer']['2'] = ["asuh-hcc"];
        $questions['3']['answer']['1'] = ["processisolation"];
        $questions['3']['answer']['2'] = ["3630"];
        $questions['4']['answer']['1'] = ["abstraction"];
        $questions['4']['answer']['2'] = ["1991"];
        $questions['5']['answer']['1'] = ["layering"];
        $questions['5']['answer']['2'] = ["21"];
        $questions['6']['answer']['1'] = ["resourceencapsulation"];
        $questions['6']['answer']['2'] = ["greenhouse"];
        $questions['7']['answer']['1'] = ["domainseparation"];
        $questions['7']['answer']['2'] = ["seven","7"];
        $questions['7']['answer']['3'] = ["payphones"];
        $questions['8']['answer']['1'] = ["datahiding","informationhiding"];
        $questions['8']['answer']['2'] = ["queen"];
        $questions['8']['answer']['3'] = ["crane"];
        $questions['9']['answer']['1'] = ["modularity"];
        $questions['9']['answer']['2'] = ["kessinger"];

        $json_desc = json_encode($description, JSON_PRETTY_PRINT);
        $json_ques = json_encode($questions, JSON_PRETTY_PRINT);

        file_put_contents("/var/www/helpers/description.json", $json_desc);
        file_put_contents("/var/www/helpers/questions.json", $json_ques);
    ?>
    <h2>The script has be executed</h2>
    <a href="../../">Go Back to Map</a><br/>
    <a href="../">Go Back to Controls</a></br>
</body>
</html>
