<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Prime-Cinema</title>
		<link rel="stylesheet" href="../style/style.css">
        <script src="../jquery/jquery.js"></script>
        <style>
              .clubsTable tr td {
                border: 2px solid green;
                padding: 5px;
                margin-bottom: 15px;
             }
             input[type=text] {
                 height: 25px;
                 width: 30%;
             }
             select {
                  height: 30px;
                  width: 30%;
              }
              body {
                    margin: 0; font-family: arial, verdana, sans-serif; background: #fbfbfb;}
                    ul,li {margin: 0; padding: 0; list-style: none;}
                    a, a:hover {text-decoration: none;}
                    .wrapper {width: 960px; margin: 0 auto; text-align: justify;}

                    /* Tabs */
                    #tabs {border: 1px solid #ccc; border-radius: 8px}
                    #tabs .tabs {overflow: hidden; border-bottom: 1px solid #ccc}
                    #tabs .tabs li {float: left;}
                    #tabs .tabs li + li {border-left: 1px solid #ccc}
                    #tabs .tabs li a {display: block; padding: 8px 16px; font-size: 18px; line-height: 21px; color: #999;}
                    #tabs .tabs li a.active,
                    #tabs .tabs li a:hover {color: #369;}

                    #tabs .tabs-content {padding: 20px; font-size: 16px; line-height: 21px;}
          </style> 
          <script>
            $(document).ready(function(){
            var tabs = $('#tabs');
            $('.tabs-content > div', tabs).each(function(i){
                if ( i != 0 ) $(this).hide(0);
            });
            tabs.on('click', '.tabs a', function(e){
                /* Запобігаємо стандартну обробку при кліку при посиланні*/
                e.preventDefault();

                /* Дізнаємося ID блока який потрібно відобразити*/
                var tabId = $(this).attr('href');

                /* Видаляємо всі класи у якорів і ставимо active поточній вкладці*/
                $('.tabs a',tabs).removeClass();
                $(this).addClass('active');

                /* Ховаємо вміст інших вкладок показуємо поточну вкладку*/
                $('.tabs-content > div', tabs).hide(0);
                $(tabId).show();
            });
        });
        </script>      
        
	</head>
	<body>
            <div id="header">
                <?php include "blocks/header.php"; ?>
            </div>
            <div id="outer_block">
            <div id="inner_block">
                <div id="center_side">
                    <?php include "blocks/center_side.php"; ?>
                </div>
            </div>
            </div>
            <footer>
               <?php include "blocks/footer.php"; ?>
            </footer>
    </body>
	
</html>