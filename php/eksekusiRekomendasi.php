<?php
session_start();
use LucianoTonet\GroqPHP\Groq;

require '../vendor/autoload.php'; // Pastikan path ke autoload.php sesuai

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $productType = $_POST['product-type'] ?? '';
    $skinProblems = $_POST['skin-problem'] ?? [];
    $mainIngredient = $_POST['main-ingredient'] ?? '';
    $productDescription = $_POST['product-description'] ?? '';
    $marketingTargets = $_POST['marketing-target'] ?? [];
    $marketingStrategy = $_POST['marketing-strategy'] ?? '';

    $prompt = "Saya mencari rekomendasi produk perawatan kulit yang sesuai dengan detail berikut:
    - Jenis kulit: $productType
    - Masalah kulit: " . implode(', ', $skinProblems) . "
    - Bahan utama: $mainIngredient
    - Deskripsi produk: $productDescription

    Mohon berikan rekomendasi produk yang cocok untuk kondisi kulit ini. Jelaskan mengapa produk tersebut cocok, termasuk fitur-fitur utama dan manfaatnya.

    Selain itu, berikan strategi pemasaran yang efektif untuk produk ini:
    - Target promosi: " . implode(', ', $marketingTargets) . "
    - Strategi pemasaran: $marketingStrategy
    - Kanal pemasaran yang disarankan
    - Jenis konten promosi yang harus digunakan.

    Pastikan respons diberikan dalam bahasa Indonesia.";

    try {
        
        $groq = new Groq('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');

        $chatCompletion = $groq->chat()->completions()->create([
            'model'    => 'mixtral-8x7b-32768', 
            'messages' => [
                [
                    'role'    => 'user',
                    'content' => $prompt
                ],
            ],
        ]);
        
        $recommendations = isset($chatCompletion['choices'][0]['message']['content']) ? $chatCompletion['choices'][0]['message']['content'] : 'Tidak ada rekomendasi yang tersedia saat ini.';

        header("Location: hasil.php?recommendations=" . urlencode($recommendations));
        exit();
    } catch (Exception $e) {
        $errorMessage = 'Error: ' . $e->getMessage();
        header("Location: rekomendasi.php?error=" . urlencode($errorMessage));
        exit();
    }
} else {
   
    header("Location: rekomendasi.php?error=invalid_method");
    exit();
}
?>
