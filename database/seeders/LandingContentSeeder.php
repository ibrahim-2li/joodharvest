<?php

namespace Database\Seeders;

use App\Models\LandingContent;
use Illuminate\Database\Seeder;

class LandingContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            // Hero Section
            ['section' => 'hero', 'key' => 'title', 'value_en' => 'Your Trusted Partner in Cold Chain Excellence', 'value_ar' => 'شريكك الموثوق في التميز بسلسلة التبريد', 'type' => 'text'],
            ['section' => 'hero', 'key' => 'description', 'value_en' => 'Importing, cold storage, and distribution of premium chilled and frozen food products with full compliance to international standards.', 'value_ar' => 'استيراد وتخزين وتوزيع منتجات غذائية مبردة ومجمدة عالية الجودة مع الالتزام الكامل بالمعايير العالمية.', 'type' => 'textarea'],
            ['section' => 'hero', 'key' => 'image', 'value_en' => '', 'value_ar' => '', 'type' => 'image'],
            
            // About Section
            ['section' => 'about', 'key' => 'title', 'value_en' => 'About Jood Harvest', 'value_ar' => 'عن جود هارفيست', 'type' => 'text'],
            ['section' => 'about', 'key' => 'description', 'value_en' => 'Jood Harvest specializes in importing and distributing high-quality chilled and frozen food products, adhering to the highest international cold chain standards, and providing integrated logistics solutions including cold storage and refrigerated transportation through its own fleet.', 'value_ar' => 'تعمل جود هارفيست في استيراد وتوزيع الأغذية المبردة والمجمدة عالية الجودة، مع الالتزام بأعلى معايير سلسلة التبريد العالمية، وتقديم حلول لوجستية متكاملة تشمل التخزين والنقل عبر أسطول مبرد خاص بالشركة.', 'type' => 'textarea'],
            ['section' => 'about', 'key' => 'vision', 'value_en' => 'To be a leading and trusted destination for chilled and frozen food import and distribution in the region.', 'value_ar' => 'أن نكون وجهة رائدة وموثوقة في استيراد وتوزيع الأغذية المبردة والمجمدة في المنطقة.', 'type' => 'textarea'],
            ['section' => 'about', 'key' => 'mission', 'value_en' => 'To deliver safe, high-quality food products supported by efficient and reliable logistics services.', 'value_ar' => 'تقديم منتجات غذائية آمنة وعالية الجودة مع خدمات لوجستية فعّالة وموثوقة.', 'type' => 'textarea'],
            
            // Services Section
            ['section' => 'services', 'key' => 'service1_title', 'value_en' => 'Import of Chilled & Frozen Foods', 'value_ar' => 'استيراد الأغذية المبردة والمجمدة', 'type' => 'text'],
            ['section' => 'services', 'key' => 'service1_description', 'value_en' => 'High-quality imported chilled and frozen food products with full compliance to international standards.', 'value_ar' => 'منتجات غذائية مبردة ومجمدة مستوردة عالية الجودة مع الالتزام الكامل بالمعايير العالمية.', 'type' => 'textarea'],
            ['section' => 'services', 'key' => 'service2_title', 'value_en' => 'Cold Storage & Warehouse Management', 'value_ar' => 'التخزين المبرد وإدارة المخازن', 'type' => 'text'],
            ['section' => 'services', 'key' => 'service2_description', 'value_en' => 'State-of-the-art cold storage facilities with advanced temperature control and monitoring systems.', 'value_ar' => 'مرافق تخزين مبردة حديثة مع أنظمة تحكم ومراقبة درجة حرارة متقدمة.', 'type' => 'textarea'],
            ['section' => 'services', 'key' => 'service3_title', 'value_en' => 'Refrigerated Transportation', 'value_ar' => 'النقل المبرد عبر أسطول جود هارفيست', 'type' => 'text'],
            ['section' => 'services', 'key' => 'service3_description', 'value_en' => 'Reliable refrigerated transport via our own fleet, ensuring product integrity from warehouse to destination.', 'value_ar' => 'نقل مبرد موثوق عبر أسطولنا الخاص، مما يضمن سلامة المنتج من المستودع إلى الوجهة.', 'type' => 'textarea'],
            
            // Contact Section
            ['section' => 'contact', 'key' => 'phone', 'value_en' => '+966 XX XXX XXXX', 'value_ar' => '+966 XX XXX XXXX', 'type' => 'phone'],
            ['section' => 'contact', 'key' => 'email', 'value_en' => 'info@joodharvest.com', 'value_ar' => 'info@joodharvest.com', 'type' => 'email'],
            ['section' => 'contact', 'key' => 'location', 'value_en' => '', 'value_ar' => '', 'type' => 'textarea'],
        ];

        foreach ($contents as $content) {
            LandingContent::updateOrCreate(
                ['section' => $content['section'], 'key' => $content['key']],
                $content
            );
        }
    }
}
