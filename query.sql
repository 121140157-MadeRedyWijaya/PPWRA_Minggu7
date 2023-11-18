SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE mahasiswa (
  nim bigint(10) NOT NULL,
  nama varchar(50) NOT NULL,
  prodi varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE mahasiswa ADD PRIMARY KEY (nim);


INSERT INTO mahasiswa (nim, nama, prodi) VALUES
  (121000001, 'Agus Saipudin', 'IF'),
  (121000002, 'Budi Nugroho', 'IF'),
  (121000003, 'Caca Lutfia', 'AR'),
  (121000004, 'Desi Handayani', 'AR'),
  (121000005, 'Eko Nugroho', 'PWK'),
  (121000006, 'Fila Dwi', 'PWK'),
  (121000007, 'Ginanda', 'EL'),
  (121000008, 'Handayogi', 'EL'),
  (121000009, 'Indah Permata', 'SI'),
  (121000010, 'Joko Anwar', 'TSE'),
  (121000011, 'Kevin Ananta', 'TSE'),
  (121000012, 'Linda Mutia', 'BI'),
  (121000013, 'Mutia Safira', 'BI'),
  (121000014, 'Nanda Anisa', 'FA'),
  (121000015, 'Oman Karudin', 'FA'),
  (121000016, 'Putri Kinanti', 'FA'),
  (121000017, 'Qiwi Utami', 'PWK'),
  (121000018, 'Randy Ardito', 'TG'),
  (121000019, 'Setiano', 'TG'),
  (121000020, 'Tulip Nurdiansyah', 'AR');

COMMIT;

