<?php
require_once 'auth_check.php';
require_once 'config/conexao.php';
require_once 'fpdf/fpdf.php'; 

$filmes = [];
try {
    $stmt = $conn->query("SELECT titulo, genero, ano FROM filmes ORDER BY titulo");
    $filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar filmes: " . $e->getMessage());
}


class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial','B',15);
        $this->Cell(80);
        $this->Cell(30,10,'Relatorio de Filmes',0,0,'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function CriarTabela($header, $data)
    {
        $this->SetFillColor(0,0,0); 
        $this->SetTextColor(255);   
        $this->SetDrawColor(0,0,0);
        $this->SetFont('','B');
        
        $w = array(120, 40, 30); 
        
        for($i=0; $i<count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        
        $fill = false;
        foreach($data as $row)
        {
            $this->Cell($w[0], 6, $row['titulo'], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row['genero'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row['ano'], 'LR', 0, 'R', $fill);
            
            $this->Ln(); 
            
            $fill = !$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$header = array('Titulo', 'Genero', 'Ano');

$pdf->CriarTabela($header, $filmes);

$pdf->Output(); 
?>