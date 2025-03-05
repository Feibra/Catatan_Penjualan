const jenisKata = [
  "Tabel Pemasukan Dan Pengeluaran",
  "Tabel Pelanggan",
  "Tabel Stock",
  "Tabel Penjualan",
];

const resultsBox = document.querySelector(".result-box");
const inputBox = document.getElementById("input-box");
const searchButton = document.getElementById("search-button");

inputBox.onkeyup = function () {
  let result = [];
  let input = inputBox.value;
  if (input.length) {
    result = jenisKata.filter((keyword) => {
      return keyword.toLowerCase().includes(input.toLowerCase());
    });
    console.log(result);
  }
  display(result);

  if (!result.length) {
    resultsBox.innerHTML = "";
  }
};

function display(result) {
  const content = result.map((list) => {
    return "<li onclick='selectInput(this)'>" + list + "</li>";
  });

  resultsBox.innerHTML = "<ul>" + content.join("") + "</ul>";
}

function selectInput(list) {
  inputBox.value = list.innerHTML;
  resultsBox.innerHTML = "";
}

searchButton.onclick = function () {
  const input = inputBox.value;
  if (jenisKata.includes(input)) {
    if (input === "Tabel Pemasukan Dan Pengeluaran") {
      window.location.href =
        "./Tabel/Pemasukan_Pengeluaran/tabel_pemasukan_pengeluaran.php";
    } else if (input === "Tabel Pelanggan") {
      window.location.href = "./Tabel/Pelanggan/tabel_pelanggan.php";
    } else if (input === "Tabel Stock") {
      window.location.href = "./Tabel/Stock/tabel_stock.php";
    } else if (input === "Tabel Penjualan") {
      window.location.href = "./Tabel/Penjualan/tabel_penjualan.php";
    }
  } else {
    alert("Tabel tidak ditemukan!");
  }
};
