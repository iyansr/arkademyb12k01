let string = 'programmerit';
let ar = string.split('');

let angka = Math.floor(Math.random(ar.length) * 10);
for (let i = 0; i < ar.length; i++) {
  let tes = ar.slice();
  console.log(tes);
}

console.log(angka);
console.log(ar.length);
