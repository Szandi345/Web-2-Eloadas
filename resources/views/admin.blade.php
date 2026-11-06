<x-mainpage>
    <h1>🍕 Pöpec Pizza – Adminisztráció</h1>

    <p>Üdvözlünk a Pöpec Pizza adminisztrációs felületén!</p>

    <p>Válaszd ki, melyik funkciót szeretnéd használni:</p>

    <div style="margin-top: 25px;">

        <a href="{{ route('crud.index') }}"
           style="
               display: inline-block;
               background-color: #2980b9;
               color: white;
               padding: 15px 25px;
               margin: 10px;
               text-decoration: none;
               border-radius: 6px;
               font-weight: bold;
           ">
            🍕 Pizzák kezelése
        </a>

        <a href="{{ route('admin.rendelesek') }}"
           style="
               display: inline-block;
               background-color: #d35400;
               color: white;
               padding: 15px 25px;
               margin: 10px;
               text-decoration: none;
               border-radius: 6px;
               font-weight: bold;
           ">
            📋 Beérkezett rendelések
        </a>

    </div>
</x-mainpage>
