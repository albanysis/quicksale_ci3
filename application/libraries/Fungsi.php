<?php

class Fungsi
{
  protected $ci;

  function __construct()
  {
    $this->ci = get_instance();
  }

  function user_login()
  {
    $this->ci->load->model('user_model');
    $user_id = $this->ci->session->userdata('userid');
    $user_data = $this->ci->user_model->get($user_id)->row();
    return $user_data;
  }

  function PdfGenerator($html, $filename)
  {
    // instantiate and use the dompdf class
    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A8', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($filename, array('Attachment' => 0));
  }
}
