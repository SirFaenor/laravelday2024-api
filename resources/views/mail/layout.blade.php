<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes,minimum-scale=.5,maximum-scale=3">
        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap');
        
            body 
            { 
                line-height: 2;
                margin: 0;
                padding: 0;
                font-family: 'Open Sans',Arial,Helvetica,sans-serif;
                font-size: 1rem;
                color: #141414;
                background: #F0F0F0;
            }
        
            h1,h2,h3,h4,h5,h6 
            {
                font-size: 1em;
                color: #141414;
            }
        
            a { color: #141414; text-decoration: underline; font-weight: bold; }
            strong { font-weight: bold; }
        
            .reset {
                margin: 0;
                padding: 0;
                list-style: none;
            }
        
            abbr { text-decoration: none; }
        
            #wrapper 
            {
                padding: 45px 10px;
                text-align: center;
                background: #F0F0F0;
                max-width: 600px;
                margin: 0 auto;
            }
        
                #wrapper_center {
                    max-width: 600px;
                    margin: 0 auto;
                }
        
                h1 { line-height: 30px; margin: 0 0 35px 0; font-size: 15px;  }
        
                .section {
                    padding: 25px 25px;
                    margin-bottom: 30px;
                    text-align: left;
                    background: #FFF;
                }
        
                .section_no_margin {margin-bottom: 0;}
        
        
                    .section_title {
                        padding: 0;
                        margin: 0 0 20px 0;
                        font-size: 13px;
                        font-weight: normal;
                        text-transform: uppercase;
                        border-bottom: 1px solid #DDDDDD;
                    }
        
                    .section_content {
                        padding-top: 20px;
                        margin-top: -9px;
                        margin-bottom: 40px;
                    }
        
                    .btn {
                        height: 56px;
                        padding: 18px 30px 17px 30px;
                        box-sizing: border-box;
                        display: block;
                        position: relative;
                        text-align: center;
                        text-decoration: none;
                        white-space: nowrap;
                        letter-spacing: .1154em;
                        text-transform: uppercase;
                        color: #FFFFFF;
                        background-color: #003762;
                        background-image: -webkit-gradient(left top, right top, color-stop(0%, #003762), color-stop(100%, #235A85));
                        background-image: -webkit-linear-gradient(140.26deg, #003762 0%, #235A85 100%);
                        background-image: -moz-linear-gradient(140.26deg, #003762 0%, #235A85 100%);
                        background-image: -ms-linear-gradient(140.26deg, #003762 0%, #235A85 100%);
                        background-image: -o-linear-gradient(140.26deg, #003762 0%, #235A85 100%);
                        background-image: linear-gradient(140.26deg, #003762 0%, #235A85 100%);
                    }
       
        
            #footer { 
                max-width: 400px;
                padding-top: 34px;
                margin: 0 auto;
                line-height: 1.2;
                font-size: 12px;
                color: #666666;
            }
        
                #footer a {
                    font-weight: normal;
                    text-decoration: none;
                    color: #666666;
                }
        
            .table_data { 
                width: 100%; 
                border-spacing: 0; 
                border-collapse: collapse;
            }
                .table_data th { padding: 10px; vertical-align: top; text-align: left; text-transform: uppercase; }
                .table_data td { padding: 10px; border-bottom: 1px solid #DDDDDD; vertical-align: top; text-align: left; }
                    .table_data td.right { text-align: right; }
        
                .table_data td.image {padding: 0;}
        
        
            @media only screen and (min-width: 500px){                                                
                #wrapper { 
                    padding-right: 25px !important; 
                    padding-left: 25px !important; 
                }
            }
        
            @media only screen and (min-width: 600px){
                .section {
                    padding-right: 60px !important;
                    padding-left: 60px !important;
                }
            }
        </style>
        <div id="wrapper">

            <div id="wrapper_center">
                <h1><img src="{{asset("img/logo_mail.png")}}" alt="Logo {{config("site.company.name")}}" style="width: 150px; max-width: 100%;"></h1>
            </div> <!-- #wrapper_center -->
            
            @isset($content)
            {!! $content !!}
            @else
                @yield('content') 
            @endif

            <div id="footer">
                &copy; {{config("site.company.name")}}  <br>
            </div>
        </div> <!-- #wrapper -->

    </body>
</html>

