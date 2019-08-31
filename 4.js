let angka = 5956560159466056;
let arrayb = ('' + angka).split('0').map(Number);

console.log(arrayb);

//Sortng Angka pertama
let Angka1 = arrayb[0];
let arrayAngka1 = Array.from(String(Angka1), Number);
arrayAngka1.sort();
arrayAngka1 = arrayAngka1.join('');

//Sortng Angka kedua
let Angka2 = arrayb[1];
let arrayAngka2 = Array.from(String(Angka2), Number);
arrayAngka2.sort();
arrayAngka2 = arrayAngka2.join('');

//Sortng Angka ketiga
let Angka3 = arrayb[2];
let arrayAngka3 = Array.from(String(Angka3), Number);
arrayAngka3.sort();
arrayAngka3 = arrayAngka3.join('');

console.log('' + arrayAngka1 + arrayAngka2 + arrayAngka3);
