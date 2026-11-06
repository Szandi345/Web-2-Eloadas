
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pöpec Pizza – Admin rendelések</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1300px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            color: #d35400;
            text-align: center;
        }

        .tabla {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #d35400;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .allapot {
            display: inline-block;
            background-color: #fff3cd;
            color: #856404;
            padding: 7px 12px;
            border-radius: 6px;
            font-weight: bold;
            white-space: nowrap;
        }
        .gomb {
            display: inline-block;
            padding: 10px 15px;
            margin: 5px;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .pizzakezelés { background-color: #d35400; }
        .vissza { background-color: #555; }

        .ures {
            text-align: center;
            margin-top: 25px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>🍕 Pöpec Pizza – Beérkezett rendelések</h1>

    <a href="{{ route('crud.index') }}" class="gomb pizzakezelés">
        🍕 Pizzák kezelése (CRUD)
    </a>

    <a href="{{ route('home') }}" class="gomb vissza">
    Vissza a főoldalra
    </a>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if($rendelesek->isEmpty())

        <p class="ures">
            Még nem érkezett rendelés.
        </p>

    @else

        <div class="tabla">
            <table>
                <thead>
                    <tr>
                        <th>Rendelés ID</th>
                        <th>Felhasználó</th>
                        <th>Pizza</th>
                        <th>Kategória</th>
                        <th>Darab</th>
                        <th>Egységár</th>
                        <th>Végösszeg</th>
                        <th>Rendelés ideje</th>
                        <th>Állapot</th>    
                    </tr>
                </thead>

                <tbody>
                    @foreach($rendelesek as $rendeles)
                        <tr>
                            <td>#{{ $rendeles->rendelesid }}</td>

                            <td>{{ $rendeles->felhasznalo }}</td>

                            <td>{{ $rendeles->pizzanev }}</td>

                            <td>{{ $rendeles->kategorianev }}</td>

                            <td>{{ $rendeles->darab }} db</td>

                            <td>
                                {{ number_format($rendeles->ar, 0, ',', ' ') }} Ft
                            </td>

                            <td>
                                <strong>
                                    {{ number_format($rendeles->ar * $rendeles->darab, 0, ',', ' ') }} Ft
                                </strong>
                            </td>

                            <td>{{ $rendeles->felvetel }}</td>

                            <td>
                                @if(\Carbon\Carbon::parse($rendeles->felvetel)->addMinutes(15)->isPast())
                                    <span style="color: green; font-weight: bold;">
                                        Kiszállítva
                                    </span>
                                @else
                                    <span style="color: orange; font-weight: bold;">
                                        Megrendelve
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif

</div>

</body>
</html>
