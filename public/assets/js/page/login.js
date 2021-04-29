$(document).ready(function () {
  const greetingText = () => {
    const now = moment()
    const currentHour = now.hour()
      if (currentHour >= 12 && currentHour <=14) return "Selamat Siang"
      else if (currentHour >= 15 && currentHour <=17) return "Selamat Sore"
      else if (currentHour >= 18) return "Selamat Malam"
      else return "Selamat Pagi"
  }

  $('.greeting').html(greetingText);
});
