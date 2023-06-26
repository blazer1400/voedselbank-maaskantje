<!DOCTYPE html>
<html>
    <head>
        <title>Voedselbank Maaskantje</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <?php

        require('php/dbConnection.php');

        $klanten = array();
        $products = array();

        $query = $dbConnection->query('SELECT * FROM klanten');

        while($row = $query->fetch_assoc()) {
            $klanten[] = $row;
        }

        $productQuery = $dbConnection->query("SELECT * FROM productvoorraad");

        while($row = $productQuery->fetch_assoc()) {
            $products[] = $row;
        }

        ?>
    </head>
    <body>
    <div class="m-4">
        <div class="mx-auto relative px-5 max-w-screen-xl w-full flex flex-wrap items-center justify-end">
            <!-- Navbar Logo -->
            <div class="absolute left-0 flex flex-row">
                <img class="h-10 hidden md:inline-block" src="./img/imghome/Logo.png" alt="het logo van voedselbank maaskantje">
                <div class="text-3xl font-light uppercase ml-2">
                    <span class="hidden md:inline-block">Maaskantje</span>
                </div>
            </div>

            <!-- Navbar Menu -->
            <nav class="flex flex-row gap-5">
                <a href="php/Homepage.php">Home</a>
                <a href="php/overzichtproduct.php">Productvoorraad</a>
                <a href="#">Leveranciers</a>
                <a href="php/overzichtklant.php">klanten</a>
                <a class=" px-2 py-1 inline-block bg-green-500 text-white hover:bg-green-400 transition-colors  rounded" href="#">Log in</a>
            </nav>
        </div>
        <div class="mt-20 mx-10">
            <form method="post" action="./php/addVoedselPakketHandler.php">
                <div class="flex items-center justify-center">
                    <select class="border rounded p-1 w-full" id="select" name="id_klant">
                        <option value="">Selecteer gezin</option>
                        <?php foreach($klanten as $klant): ?>
                            <option value="<?php echo $klant['idklanten'] ?>"><?php echo $klant['gezinsnaam'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div id="container" style="opacity:0">
                    <div class="mt-4">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">Product</th>
                                <th class="p-3 text-sm font-semibold tracking-wide text-left">Aantal</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100" id="tableBody">
                            <tr class="bg-white border-b" style="display: none" id="tableRow">
                                <td class="w-[70%] p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <select class="border rounded p-1 w-full" id="select">
                                        <option value="">Kies een product</option>
                                        <?php foreach($products as $product): ?>
                                            <option value="<?php echo $product['EAN Nummer'] ?>"><?php echo $product['Productnaam'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td class="w-[30%] p-3 text-sm text-gray-700 whitespace-nowrap">
                                    <input type="number" class="rounded border p-1 w-full" id="number" placeholder="Aantal" />
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <button class="ml-auto rounded p-2 bg-green-500 hover:bg-green-400 block text-white">Opslaan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('select').addEventListener("change", (e) => {
            if (e.target.value) {
                document.getElementById('container').style.opacity = "1"
            } else {
                document.getElementById('container').style.opacity = "0"
            }
        })

        let count = 0

        function addRow(e) {
            if (e.target.value) {

                count++

                if (document.getElementById('latestSelect')) {
                    document.getElementById('latestSelect').removeEventListener("change", (e) => addRow(e))

                    document.getElementById('latestRow').id = ""
                    document.getElementById('latestSelect').id = ""
                }

                let newRow = document.getElementById('tableRow').cloneNode(true)
                newRow.id = 'latestRow'
                newRow.style.display = ""

                newRow.querySelector('#number').name = 'amount_' + count
                newRow.querySelector('#select').name = 'product_' + count
                document.getElementById('tableBody').appendChild(newRow)
                newRow.querySelector('#select').id = 'latestSelect'
                newRow.querySelector('#latestSelect').addEventListener("change", (e) => addRow(e))
            }
        }

        let fakeEvent = {target: {value: true}}
        addRow(fakeEvent)
    </script>
    </body>
</html>