1. index() - atvaizduoja visas duomenų bazėje išsaugotas temperatūras, atvaizdavimui panaudojau cache-remember
2. fetch() - įvedus norimą miestą, atvaizduojamas miesto pavadinimas, šalis, temperatūra ir oras(rūkas, vėjuota ir pan)
3. storeTemperature() - išsaugo pasirinkto miesto temperatūrą į DB, šios funkcijos iškvietimui panaudojau schedule
4. įdiegiau JWT autentifikaciją
5. Viską tikrinau su postman įrankiu, viskas veikė

6. Duomenų periodiniam nuskaitymui ir įrašymui norėjau panaudoti laravel queues, tačiau, kiek skaičiau, kiek bandžiau skirtingų variantų, kol kas nesigavo.