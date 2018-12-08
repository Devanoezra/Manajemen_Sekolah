
function validasiMapel() {
    var kode_mapel = document.getElementById('kode_mapel');
    var mapel = document.getElementById('mapel');
    var alokasi_waktu = document.getElementById('alokasi_waktu');
    var semester = document.getElementById('semester');
    var kode_guru = document.getElementById('kode_guru');

    if(kode.value == "")
    {
        alert("Anda belum mengisi kode MataPelajaran");
        kode.focus();
        return false;
    }
    else if(nama_matkul.value == "")
    {
        alert("Anda belum mengisi Mata Pelajaran");
        nama_matkul.focus();
        return false;
    }
    else if(sks.value == "")
    {
        alert("Anda belum mengisi alokasi waktu");
        sks.focus();
        return false;
    }
    else if(semester.value == "")
    {
        alert("Anda belum mengisi semester");
        semester.focus();
        return false;
    }
    else if(id_dosen.value == "-")
    {
        alert("Anda belum mengisi Guru ");
        id_dosen.focus();
        return false;
    }
    else
    {
        return true;
    }
}

function validasiGuru() {
    var nama_guru = document.getElementById('nama_guru');
    var jumlah_jam = document.getElementById('jumlah_jam');
    var alamat = document.getElementById('alamat');
    var telp = document.getElementById('telp');
    var email = document.getElementById('email');

    if(nama_guru.value == "")
    {
        alert("Anda belum mengisi nama guru");
        nama_guru.focus();
        return false;
    }
    else if(jumlah_jam.value == "")
    {
        alert("Anda belum mengisi Jumlah Jam");
        jumlah_jam.focus();
        return false;
    }
    else if(alamat.value == "")
    {
        alert("Anda belum mengisi Alamat");
        alamat.focus();
        return false;
    }
    else if(telp.value == "")
    {
        alert("Anda belum mengisi nomer telepon");
        telp.focus();
        return false;
    }
    else if(email.value == "")
    {
        alert("Anda belum mengisi Email");
        email.focus();
        return false;
    }
    else
    {
        return true;
    }
}

function validasiLogin() {
    var username = document.getElementById('username');
    var password = document.getElementById('password');

    if(username.value == "")
    {
        alert("Anda belum mengisi Username");
        username.focus();
        return false;
    }
    else if(password.value == "")
    {
        alert("Anda belum mengisi Password");
        password.focus();
        return false;
    }
    else
    {
        return true;
    }
}