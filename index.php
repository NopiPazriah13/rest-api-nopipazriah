<?php

    include "conn.php";
    class Makanan
{
public function getmakanan(){
    global $conn;
    $query = "SELECT * from makanan";
    $hasil = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_array($hasil)) {
        //var_dump($data);
        $makanan[] = array(
            "id_makanan" => $data["id_makanan"],
            "nama_makanan" => $data["nama_makanan"],
            "harga" => $data["harga"],
            "keterangan" => $data["keterangan"]
        );
    }
    $respon[] = array(
        'status' => 'OK',
        'kode' => '200',
        'data' => $makanan
    );

    echo json_encode($respon);
}
    public function getmakananbyid($id_makanan=0){
        global $conn;
        $query = "SELECT * From makanan";
        if ($id_makanan != 0){
            $query.=" WHERE id_makanan=".$id_makanan." LIMIT 1";
        }
        $data = array();
        $result = $conn->query ($query);
        while ($row = mysqli_fetch_array($result)){
            $data[] = $row;
        }

        $respon[] = array(
        'status' => 'OK',
        'kode' => '200',
        'data' => $data
    );

    echo json_encode($respon);
    }

    public function insert_makanan()
      {
         global $conn;
         $arrcheckpost = array('id_makanan' => '', 'nama_makanan' => '', 'harga' => '', 'keterangan' => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
               $result = mysqli_query($conn, "INSERT INTO makanan SET
               id_makanan = '$_POST[id_makanan]',
               nama_makanan = '$_POST[nama_makanan]',
               harga = '$_POST[harga]',
               keterangan = '$_POST[keterangan]'");
                
               if($result)
               {
                  $response=array(
                     'status' => 200,
                     'message' =>'Makanan Added Successfully.'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Makanan Addition Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
      function update_makanan($id_makanan)
      {
         global $conn;
         $arrcheckpost = array('id_makanan' => '', 'nama_makanan' => '', 'harga' => '', 'keterangan' => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
              $result = mysqli_query($conn, "UPDATE makanan SET
               id_makanan = '$_POST[id_makanan]',
               nama_makanan = '$_POST[nama_makanan]',
               harga = '$_POST[harga]',
               keterangan = '$_POST[keterangan]',
               WHERE id_makanan='$id_makanan'");
          
            if($result)
            {
               $response=array(
                  'status' => 200,
                  'message' =>'Makanan Updated Successfully.'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Makanan Updation Failed.'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function delete_makanan($id_makanan)
   {
      global $conn;
      $query="DELETE FROM makanan WHERE id=".$id_makanan;
      if(mysqli_query($conn, $query))
      {
         $response=array(
            'status' => 200,
            'message' =>'Makanan Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Makanan Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
}
?>