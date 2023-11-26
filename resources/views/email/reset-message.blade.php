@props(['url', 'name'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification</title>
    <style>
        @media only screen and (min-width: 600px) {
            #body {
                box-sizing: border-box;
                width: 100% !important;
                height: 100vh;
                margin: 0;
                padding: 40px;
                background-color: #F3F6F8;
                text-align: center;
            }

            h1 {
                font-weight: 600;
                font-size: 24px;
                color: #2D3E50;
            }

            p {
                color: #34495E;
                font-weight: 400;
                font-size: 18px;
            }

            button {
                background: #3498DB;
                border-radius: 4px;
                padding: 12px 24px;
                font-size: 18px;
                color: #FFFFFF;
                border: none;
                font: inherit;
                outline: inherit;
                margin-top: 20px;
                margin-bottom: 30px;
                cursor: pointer;
            }

            a {
                color: #3498DB;
                text-decoration: none;
            }

            .url {
                color: #95A5A6;
                margin-top: 16px;
                margin-bottom: 20px;
                word-break: break-all;
            }

            .problem {
                margin-bottom: 18px;
            }

            .hi {
                margin-bottom: 18px;
            }

            .crew {
                color: #95A5A6;
                font-size: 14px;
            }
        }
    </style>
</head>

<body id=body>
    <p .class="hi">{{__('validation.hello')}} {{ucwords($name)}}</p>
    <p>{{__('validation.thanks_for_reset')}}
    </p>
    <a href="{{$url}}"><button>
            {{__('validation.reset_password')}}

        </button></a>
    <p>{{__('validation.if_click_fails')}}</p>
    <p class="url">{{$url}}</p>
    <p class="problem">{{__('validation.have_any_problems')}}</p>
    <p class="crew">{{__('validation.lshop_crew')}}</p>
</body>

</html>