const bioData = {
  name: 'I Putu Saputrayana',
  age: 22,
  address: 'JL. Anawai RT06/RW06, Kendari, Sulawesi Tenggara',
  is_married: false,
  list_school: [
    {
      name: 'SMKN 2 Kendari',
      year_in: 2012,
      year_out: 2015,
      major: null
    },
    {
      name: 'STMIK Catur Sakti Kendari',
      year_in: 2018,
      year_out: undefined,
      major: 'Sistem Informasi'
    }
  ],
  skills: [
    {
      skill_name: 'Dart (Flutter)',
      level: 'semi-advanced'
    },
    {
      skill_name: 'Javascript',
      level: 'advanced'
    },
    {
      skill_name: 'Java',
      level: 'beginner - advanced'
    },
    {
      skill_name: 'Photoshop',
      level: 'beginner'
    },
    {
      skill_name: 'MySQL',
      level: 'beginner'
    }
  ]
};

const bioDataJson = JSON.stringify(bioData);

console.log(bioDataJson);
