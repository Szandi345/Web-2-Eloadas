
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pöpec Pizza – Adminisztráció</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
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

        .uj { background-color: #27ae60; }
        .szerkeszt { background-color: #2980b9; }
        .torol { background-color: #c0392b; }
        .rendeles { background-color: #d35400; }
        .vissza { background-color: #555; }

        .tabla {
            overflow-x: auto;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>🍕 Pöpec Pizza – Adminisztráció (CRUD)</h1>

    @if(session('success'))
        <p style="color: green; font-weight: bold;">
            {{ session('success') }}
        </p>
    @endif

    @if(session('error'))
        <p style="color: red; font-weight: bold;">
            {{ session('error') }}
        </p>
    @endif

    <a href="{{ route('crud.create') }}" class="gomb uj">
        + Új pizza hozzáadása
    </a>

    <a href="{{ route('admin.rendelesek') }}" class="gomb rendeles">
        📋 Beérkezett rendelések
    </a>

    <a href="{{ route('home') }}" class="gomb vissza">
    Vissza a főoldalra
    </a>

    <div class="tabla">
        <table>
            <thead>
                <tr>
                    <th>Pizza ID</th>
                    <th>Pizza neve</th>
                    <th>Kategória</th>
                    <th>Vegetáriánus</th>
                    <th>Műveletek</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pizzak as $pizza)
                    <tr>
                        <td>{{ $pizza->pizzaid }}</td>
                        <td>{{ $pizza->nev }}</td>
                        <td>{{ $pizza->kategorianev }}</td>
                        <td>
                            {{ $pizza->vegetarianus ? 'Igen' : 'Nem' }}
                        </td>
                        <td>
                            <a href="{{ route('crud.edit', $pizza->pizzaid) }}"
                               class="gomb szerkeszt">
                                Szerkesztés
                            </a>

                            <form action="{{ route('crud.destroy', $pizza->pizzaid) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Biztosan törölni szeretnéd ezt a pizzát?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="gomb torol">
                                    Törlés
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            Nincs megjeleníthető pizza.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
