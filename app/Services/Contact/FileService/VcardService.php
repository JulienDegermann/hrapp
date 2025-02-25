<?php

namespace App\Services\Contact\FileService;

class VcardService
{

    private string $filePath = "";

    /**
     * create a CSV file with sender's datas
     * @param array $datas - datas to save as Csv
     * @return string - csv filePath
     */
    public function createVcard(array $datas): string
    {

        $this->filePath = 'mails/contact' . uniqid() . '.vcf';
        
        $contact = [
            'first_name' => $datas['first_name'] ?? '',
            'last_name' => $datas['last_name'] ?? '',
            'email' => $datas['email'] ?? '',
            'phone' => $datas['phone'] ?? '',
            'company' => $datas['company'] ?? '',
        ];


        
        $vcard = "BEGIN:VCARD\n";
        $vcard .= "VERSION:3.0\n";
        $vcard .= "FN:{$contact['first_name']} {$contact['last_name']}\n";
        $vcard .= "N:{$contact['last_name']};{$contact['first_name']};;;\n";
        $vcard .= "EMAIL:{$contact['email']}\n";
        $vcard .= "TEL;TYPE=mobile:{$contact['phone']}\n";
        $vcard .= "ORG:{$contact['company']}\n";
        $vcard .= "END:VCARD\n";
        
        file_put_contents($this->filePath, $vcard);
        



        // $file = fopen($this->filePath, 'w');
        // fputcsv($file, $datas);
        // fclose($file);

        return $this->filePath;
    }

    /**
     * delete csv file from server
     * @param File $file - file to delete
     * @return bool
     */
    public function deleteVcard(): void
    {
        if (file_exists($this->filePath)) {
            unlink($this->filePath);
        }
    }
}
