$(document).ready(function () {
  //Date picker
  $("#reservationdate").datetimepicker({
    format: "YYYY-MM-DD",
  });

  // Menambah item baru
  $(".tambah-item").click(function () {
    let panjangRow = $(".table tr").length;
    let no = panjangRow;

    $("#tbody").append(
      //     <td id="item` +
      //   no +
      //   `">` +
      //   no +
      //   `</td>
      `<tr class="new-item text-center">
        <td>
          <input class="form-control <?= ($validation->hasError('namaMenu')) ? 'is-invalid' : ''; ?>" list="namaMenuDataList" id="namaMenu" name="namaMenu[]" placeholder="Menu Makanan" autocomplete="off" required />
          <datalist id="namaMenuDataList">
            <?php foreach($menuTersedia as $mt) : ?>
              <option value="<?= $mt['nama']; ?>"><?= $mt['kode_menu']; ?></option>
            <?php endforeach; ?>
          </datalist>
          <div id="namaMenu" class="invalid-feedback text-left">
            <?= $validation->getError('namaMenu'); ?>
          </div>
        </td>
        <td>
          <input type="number" min=1 class="form-control <?= ($validation->hasError('noMeja')) ? 'is-invalid' : ''; ?>" id="kuantitas"name="kuantitas[]" placeholder="Kuantitas" autocomplete="off" required />
          <div id="kuantitas" class="invalid-feedback text-left">
            <?= $validation->getError('kuantitas'); ?>
          </div>
        </td>
        <td>
          <button class="btn-sm btn-danger hapus-item" type="button">
            <i class="fas fa-minus"></i>
          </button>
        </td>
      </tr>
      `
    );
    // no += 1;
  });

  // Menghapus item baru
  $("#tbody").on("click", ".hapus-item", function () {
    $(this).parents(".new-item").remove();

    // let currentRow = $(this).closest("tr");
    // let col1 = parseInt(currentRow.find("td:eq(0)").text());

    // let rowCount = $(".table tr").length;

    // for (let i = col1 + 1; i <= rowCount; i++) {
    //   let item = "#item" + i;
    //   $(item).html(i - 1);
    //   let newID = "#item" + (i - 1);
    //   $(item).attr("id", newID);
    // }
  });
});
