document.addEventListener("DOMContentLoaded", () => {
  let lat = document.querySelector("#lat").value;
  let lng = document.querySelector("#lng").value;
  let address = document.querySelector("#address").value;

  if (lat && lng) {
    var map = L.map("map").setView([lat, lng], 15);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    L.marker([lat, lng]).addTo(map).bindPopup(address).openPopup();
  }
});
