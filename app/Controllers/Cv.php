<?php

namespace App\Controllers;

// Import semua model yang kita perlukan
use App\Models\PersonalDataModel;
use App\Models\EducationModel;
use App\Models\ExperienceModel;
use App\Models\SkillsModel;
use App\Models\CertificateModel; // <-- TAMBAHKAN INI

class Cv extends BaseController
{
    public function index()
    {
        // Buat instance dari setiap model
        $personalModel = new PersonalDataModel();
        $educationModel = new EducationModel();
        $experienceModel = new ExperienceModel();
        $skillsModel = new SkillsModel();
        $certificateModel = new CertificateModel(); // <-- TAMBAHKAN INI

        // Ambil data skill dan kelompokkan berdasarkan kategori
        $allSkills = $skillsModel->findAll();
        $groupedSkills = [];
        foreach ($allSkills as $skill) {
            $groupedSkills[$skill['category']][] = $skill;
        }

        // Siapkan data untuk dikirim ke view
        $data = [
            'personal' => $personalModel->first(),
            'education' => $educationModel->orderBy('end_year', 'DESC')->findAll(),
            'experience' => $experienceModel->orderBy('start_date', 'DESC')->findAll(),
            'skills_grouped' => $groupedSkills,
            'certificates' => $certificateModel->findAll() // <-- TAMBAHKAN INI
        ];

        // Kirim data ke view 'cv_view'
        return view('cv_view', $data);
    }
}