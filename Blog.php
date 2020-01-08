<?php
/*
    PURPOSE: This class will create a Blog based off a input template.
             it's going to be my form of templates, whether or not its efficient
             is not of concern at this point as it is experimentation.
    DATE: 9/01/2020
*/
    class Blog
    {
        private $layout;
        private $siteTitle;
        private $siteDesc;
        private $blogPosts;
        function __construct($inLayout, $inSite, $inDesc)
        {
            $this->layout = setLayout($inLayout);
            $this->siteTitle = $inSite;
            $this->siteDesc = $inDesc;
        }

        /* CONSIDER MAKING LAYOUTS SEPERATE PHP OBJECT FILE. AND CREATION
        OF STYLESHEET. */
        function defaultLayoutDisplay()
        {
            $out =
            "
            <!DOCTYPE HTML>
            <html lang=\"en\">
                <head>
                    <link href=\"https://fonts.googleapis.com/css?family=Baskervville|Cute+Font|Poppins&display=swap\" rel=\"stylesheet\">
                    <meta charset=\"UTF-8\">
                    <title>{$this->siteTitle}</title>
                    <link rel=\"stylesheet\" href=\"./styletest.css\">
                    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>
                </head>
                <body>
                    <header>
                        <h1 id=\"site-title\">
                            <a href=\"#\">{$this->siteTitle}</a>
                        </h1>
                        <p id=\"title-desc\">
                            {$this->siteDesc}
                        </p>
                    </header>
                    <main>
                        <div id=\"row\">
                            <div id=\"content\">";
                            for ($z = 0; $z < count($this->blogPosts); $z++)
                            {
                                $out .= $this->blogPosts[$z];
                            }
                $out .= "</div>
                            <div id=\"extra\">

                            </div>
                        </div>
                    </main>
                    <footer>
                        <h3>Blog Created Using PHP Blog Generator</h3>
                    </footer>
                </body>
            </html>
            ";
            echo $out;
        }
        function displayBlog()
        {
            if (strcmp('default',$this->layout) == 0)
            {
                $this->defaultLayoutDisplay();
            }
        }
        function getLayout()
        {
            echo $this->layout;
        }
        function blogPost($postTitle, $postDesc, $sections, $sectionTitleArr, $sectionContentArr, $author)
        {
            $x = "";
            for ($i = 0; $i < $sections; $i++)
            {
                $x .= "<h1>{$sectionTitleArr[$i]}</h1>";
                $x .= "<p>{$sectionContentArr[$i]}</p><br><br>";
            }

            $out =
            "
            <article>
                <h1 id=\"BlogTitle\"><a href=\"#\">{$postTitle}</a></h1>
                <p>Posted On <a href=\"#\">" . date("Y/m/d") . "</a> by <a href=\"#\">{$author}</a> at " . date("h:i:sa") . "<br><br>
                {$postDesc}<br>" . $x .
            "</article>";
            $this->blogPosts[] = $out;
        }
    }

    function setLayout($x)
    {
        if (strcmp('DEFAULT',strtoupper($x)) == 0 || strcmp('D',strtoupper($x)) == 0)
            return "default";
        else
            throw new Exception("{$x} is not a valid layout.");
    }
?>
