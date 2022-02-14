<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap" rel="stylesheet">

    <style>
        body {
            width: 230mm;
            height: 100%;
            margin:  0 auto;
            padding: 0;
            font-size: 12pt;
            background: rgb(204, 204, 204);
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .main-page {
            width: 210mm;
            min-height: 297mm;
            margin: 10mm auto;
            background: #fff;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        .sub-page {
            padding: 1cm;
            height: 297mm;
            background: #fff;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }

            .main-page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

        /* Formato */
        .container {
            display: grid;
            grid-template-columns: 30% 70%;
        }

        /* Sidebar */
        .sidebar {
            background: #62b9c2;
            height: 790px;
        }

        .sidebar .logo img {
            width: 100%;
            padding: 2px;
            margin: 45px auto;
        }

        .sidebar .stamp {
            margin-bottom: 50px;
        }

        .sidebar .stamp img {
            width: 100%;
            height: auto;
            padding: 35px;
            margin: 45px auto;
        }

        .sidebar .slogan h2 {
            font-family: 'Roboto Slab', serif;
            font-weight: 300;
            text-align: center;
            color: white;
            padding: 2px;
        }

        /* Social */
        .social {
            text-align: center;
            margin: 15px auto;
        }

        .fa {
            padding: 12px;
            font-size: 32px;
            width: 54px;
            height: 54px;
            text-align: center;
            text-decoration: none;
            border-radius: 50%;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-pinterest {
            background: #cb2027;
            color: white;
        }

        .fa-instagram {
            background: #125688;
            color: white;
        }

        /* Sidebar Footer */
        .sidebar-footer {
            height: 256px;
            background: #ffd080;
            color: white;
            font-family: 'Roboto Slab', serif;
            font-size: 16px;
            text-align: center;
        }

        .sidebar-footer .contact {
            padding: 5px;
            word-wrap: break-word;
        }
        
        .contact p {
            margin: 10px auto;
            padding: 1px;
        }

        /* Content */
        .content {
            font-family: 'Montserrat', sans-serif;
            background: white;
        }

        .content .header {
            display: grid;
            background: white;
            grid-template-columns: repeat(2, 1fr);
            gap: 1em;
            grid-auto-rows: minmax(auto);
            justify-items: stretch;
            align-items: stretch;
        }

        .content .header .info {
            padding: 15px;
            grid-column: 1;
            grid-row: 1;
        }

        .content .header .title {
            font-family: 'Roboto Slab', serif;
            text-align: right;
            color: #62b9c2;
            grid-column: 2;
            grid-row: 1;
        }

        .content .title h2 {
            font-size: 42px;
            font-weight: bold;
            margin-bottom: 0;
            margin-top: 0;
        }
        
        .content hr {
            margin: 0 auto 0 15px;
            border-style: none;
            height: 3px;
            background: #62b9c2;
        }

        .content .customer {
            padding: 15px;
            font-size: 16px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1em;
            grid-auto-rows: minmax(auto);
            justify-items: stretch;
            align-items: stretch;
        }
        .name {
            grid-column: 1/3;
            grid-row: 1;
        }
        .phone {
            font-size: 13px;
            grid-column: 1/2;
            grid-row: 2;
        }

        .email {
            font-size: 13px;
            grid-column: 2/3;
            grid-row: 2;
        }

        .details {
            height: 432px;
        }
        
        .message {
            margin-bottom: 0;
        }

        .message h2 {
            margin-left: 15px;
            color: #62b9c2;
        }

        .legal {
            padding: 0 0 0 14px;
            text-align: justify;
            text-justify: inter-word;
        }

        .legal p {
            margin: 1px auto;
            font-size: 11.5px;
        }

        .special-font {
            font-size: 12px;
        }
        
    </style>
</head>
<body>
    <div class="main-page">
        <div class="sub-page">
            <div class="container">
                <div class="sidebar">
                    <div class="logo"><img src="{{asset($document_data->logo)}}" alt="logo-pequenosdormilones"></div>
                    <div class="slogan">
                        <h2>{{$document_data->slogan}}</h2>
                    </div>
                    <div class="stamp"><img src="{{asset($document_data->image)}}" alt="stamp-pequenosdormilones"></div>
                    <div class="social">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-pinterest"></a>
                        <a href="#" class="fa fa-instagram"></a>
                    </div>
                </div>
                <div class="content">
                    <div class="header">
                        <div class="info">
                            <span style="color: red; font-weight:bold;">Folio: 1</span>
                            <br> 
                            Fecha: {{date('d-m-Y', strtotime($purchase_order->created_at))}}
                        </div>
                        <div class="title"><h2>Orden de compra</h2></div>
                    </div>
                    <hr>
                    <div class="customer">
                        <div class="name">Nombre: {{$customer->first_name}} {{$customer->last_name}}</div>
                        <div class="phone">Teléfono: {{$customer->phone}}</div>
                        <div class="email">Correo: {{$customer->email}}</div>
                        <div class="address">Dirección: {{$customer->address}}</div>
                    </div>
                    <div class="details">
                        <table width="100%">
                            <thead style="color: #62b9c2;">
                              <tr class="font">
                                <th>CANT.</th>
                                <th align="left">DESCRIPCIÓN</th>
                                <th>PRECIO</th>
                                <th>TOTAL</th>
                              </tr>
                            </thead>
                            <tbody class="special-font">
                                @foreach ($items as $item)
                                <tr class="font">
                                    <td align="right">{{$item->qty}}</td>
                                    <td>{{$item->product->name}}</td>
                                    <td align="right" class="price">$ {{ number_format($item->product->sale_price, 2)}}</td>
                                    <td align="right" class="price">$ {{ number_format($item->qty * $item->product->sale_price, 2)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                    <div class="message">
                        <h2>Gracias!</h2>
                        <hr>
                    </div>
                </div>
                <div class="sidebar-footer">
                    <div class="contact">
                        <p class="address">{{$branch->address}}</p>
                        <p class="phone">{{$branch->phone}}</p>
                        <p class="email1">{{$branch->email_s}}</p>
                        <p class="email2">{{$branch->email_cs}}</p>
                    </div>
                </div>
                <div class="legal">
                    <p class="agreements"></p>
                </div>
            </div>
        </div>    
    </div>
</body>
</html>