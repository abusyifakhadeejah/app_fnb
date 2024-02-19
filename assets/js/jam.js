function showDateTime() {
    var myDiv = document.getElementById("jamDiv");
  
    var date = new Date();
    var dayList = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    var monthNames = [
      "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Agustus",
      "September",
      "Oktober",
      "November",
      "Desember"
    ];
    var dayName = dayList[date.getDay()];
    var monthName = monthNames[date.getMonth()];
    var today = `${dayName},  ${date.getDate()} ${monthName} ${date.getFullYear()}`;
  
    var hour = date.getHours();
    var min = date.getMinutes();
    var sec = date.getSeconds();
  
    var time = hour + ":" + min + ":" + sec;
    myDiv.innerText = `Hari ${today}. Jam ${time}`;
  }
  setInterval(showDateTime, 1000);
  