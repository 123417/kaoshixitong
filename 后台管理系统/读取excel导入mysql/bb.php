<?php
    session_start();
    if($_SESSION['name']==''){
        echo "<script>window.location.href='../index.html'</script>";
    }
?>
<?php
	require_once 'PHPExcel/Classes/PHPExcel.php';
	require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
	require_once 'PHPExcel/Classes/PHPExcel/Reader/Excel5.php';
	//以上三步加载phpExcel的类
     $objReader = PHPExcel_IOFactory::createReader('excel2007'); //use Excel5 for 2003 format 
     if(isset($_POST['sub'])){
        if(!is_dir('../upload')){
            mkdir('../upload');
        }
        $file=$_FILES['files'];
        // print_r($file);
        if(is_uploaded_file($file['tmp_name'])){
            $rand=rand(0,999999);
            $times=microtime();
            $extends=substr($file['name'],-5,5);
            $path='../upload/'.$rand.$times.$extends;
            if($extends=='.xlsx'){
                if(move_uploaded_file($file['tmp_name'],$path)){
                    // echo '上传成功'.$path;
                    $excelpath=$path;
                    $objPHPExcel = PHPExcel_IOFactory::load($excelpath);
                    $sheet = $objPHPExcel->getSheet(0); 
                    $highestRow = $sheet->getHighestRow();       //取得总行数 
                    $highestColumn = $sheet->getHighestColumn(); //取得总列数
                    error_reporting( E_ALL&~E_NOTICE );
                    
                    $connect=new mysqli('localhost','root','','kaoshi');
                    $connect->query('set names utf8');
                    $str = "";
                    for($j=2;$j<=$highestRow;$j++){ 
                        $titles = "";
                        $item_type = "";
                        $A='';
                        $B='';
                        $C='';
                        $D='';
                        $item_right='';
                        for($k='A';$k<=$highestColumn;$k++){ 
                                    $str = $sheet->getCell($k.$j)->getValue();
                                    if ($k=='A') $titles = $str;
                                    if ($k=='B') $item_type = $str;
                                    if ($k=='C') $A = $str;
                                    if ($k=='D') $B = $str;
                                    if ($k=='E') $C = $str;
                                    if ($k=='F') $D = $str;
                                    if ($k=='G') $item_right = $str;
                                } 
                                $sql="insert into item_bank(titles,item_type,A,B,C,D,item_right) values('$titles','$item_type','$A','$B','$C','$D','$item_right')";
                                $res=$connect->query($sql);
                                // echo $id; echo $name;
                        }
                        if($res){
                            echo "<script>alert('上传成功')</script>";
                        }
                }
            }else{
                echo "<script>alert('文件格式不对')</script>";
            }
        }
    }
	
?>
<form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="files">
        <input type="submit" name="sub" value="上传文件">
</form>