<?php

use Illuminate\Database\Seeder;

class AddDataSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $addUsers = [
            [
                'id' => '1',
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$CXfgHyNLAXwsOmGrqF/b4ep0Vt4LeH905RTz0uSNMl3wJxOoSKG0G',
                'role' => '1',
                'passToAdmin' => '12345678',
                'image' => 'users/20201104131920.png',
                'status' => 'Active',
            ],
            [
                'id' => '2',
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@user.com',
                'password' => '$2y$10$CXfgHyNLAXwsOmGrqF/b4ep0Vt4LeH905RTz0uSNMl3wJxOoSKG0G',
                'role' => '2',
                'passToAdmin' => '12345678',
                'image' => 'users/20201104131920.png',
                'status' => 'UnActive',

            ],
            [
                'id' => '3',
                'name' => 'Staff',
                'username' => 'staff',
                'email' => 'staff@staff.com',
                'password' => '$2y$10$CXfgHyNLAXwsOmGrqF/b4ep0Vt4LeH905RTz0uSNMl3wJxOoSKG0G',
                'role' => '3',
                'passToAdmin' => '12345678',
                'image' => 'users/20201104131920.png',
                'status' => 'Active',

            ],
        ];
        foreach ($addUsers as $item) {
            \App\user::create($item);
        }

        $GeneralSetting = [

            [
                'id' => 1,
                'userId' => '1',  'option' => 'siteName',
                'value' => 'PickUpCourses'
            ],
            [
                'id' => 2,
                'userId' => '1',  'option' => 'logo',
                'value' => 'site/logo.png'
            ],
            [
                'id' => 3,
                'userId' => '1',  'option' => 'favicon',
                'value' => 'site/favicon.png'
            ],
            [
                'id' => 4,
                'userId' => '1',  'option' => 'phoneNumber',
                'value' => '212 1122 4444'
            ],
            [
                'id' => 5,
                'userId' => '1',  'option' => 'whatsappPhone',
                'value' => '966504679668'
            ],
            [
                'id' => 6,
                'userId' => '1',  'option' => 'whatsappMessage',
                'value' => 'Test Message Whatsapp'
            ],
            [
                'id' => 7,
                'userId' => '1',  'option' => 'email',
                'value' => 'Support@pickupcourses.com'
            ],
            [
                'id' => 8,
                'userId' => '1',  'option' => 'facebook',
                'value' => 'facebook.com'
            ],
            [
                'id' => 9,
                'userId' => '1',  'option' => 'instagram',
                'value' => 'instagram.Com'
            ],
            [
                'id' => 10,
                'userId' => '1',  'option' => 'twitter',
                'value' => 'twitter.com'
            ],
            [
                'id' => 11,
                'userId' => '1',  'option' => 'youtube',
                'value' => 'youtube.com'
            ],
            [
                'id' => 12,
                'userId' => '1',  'option' => 'linkedin',
                'value' => 'linkedin.com'
            ],

        ];

        foreach ($GeneralSetting as $item) {
            \App\generalSetting::create($item);
        }

        $permission = [
            [
                'id' => '1',
                'userId' => 2,
                'type' => 'Leads',
                'edit' => 'on',
                'create' => 'on',
                'delete' => 'off'
            ],
            [
                'id' => 2,
                'userId' => 2,
                'type' => 'Articles',
                'edit' => 'on',
                'create' => 'on',
                'delete' => 'on'
            ],
            [
                'id' => 3,
                'userId' => 2,
                'type' => 'Packages',
                'edit' => 'on',
                'create' => 'on',
                'delete' => 'on'
            ],
            [
                'id' => 4,
                'userId' => 2,
                'type' => 'Schools',
                'edit' => 'on',
                'create' => 'on',
                'delete' => 'on'
            ],
            [
                'id' => 5,
                'userId' => 2,
                'type' => 'Promotions',
                'edit' => 'on',
                'create' => 'on',
                'delete' => 'on'
            ],
            [
                'id' => 6,
                'userId' => 2,
                'type' => 'Site',
                'edit' => 'on',
                'create' => 'off',
                'delete' => 'off'
            ],
            [
                'id' => 7,
                'userId' => 2,
                'type' => 'Core',
                'edit' => 'on',
                'create' => 'on',
                'delete' => 'off'
            ],
            [
                'id' => 8,
                'userId' => 2,
                'type' => 'Users',
                'edit' => 'off',
                'create' => 'off',
                'delete' => 'off'
            ],
            [
                'id' => '9',
                'userId' => 3,
                'type' => 'Leads',
                'edit' => 'on',
                'create' => 'on',
                'delete' => 'off'
            ],
            [
                'id' => 10,
                'userId' => 3,
                'type' => 'Articles',
                'edit' => 'on',
                'create' => 'on',
                'delete' => 'on'
            ],
            [
                'id' => 11,
                'userId' => 3,
                'type' => 'Packages',
                'edit' => 'on',
                'create' => 'on',
                'delete' => 'on'
            ],
            [
                'id' => 12,
                'userId' => 3,
                'type' => 'Schools',
                'edit' => 'on',
                'create' => 'on',
                'delete' => 'on'
            ],
            [
                'id' => 13,
                'userId' => 3,
                'type' => 'Promotions',
                'edit' => 'on',
                'create' => 'on',
                'delete' => 'on'
            ],
            [
                'id' => 14,
                'userId' => 3,
                'type' => 'Site',
                'edit' => 'on',
                'create' => 'off',
                'delete' => 'off'
            ],
            [
                'id' => 15,
                'userId' => 3,
                'type' => 'Core',
                'edit' => 'on',
                'create' => 'on',
                'delete' => 'off'
            ],
            [
                'id' => 16,
                'userId' => 3,
                'type' => 'Users',
                'edit' => 'off',
                'create' => 'off',
                'delete' => 'off'
            ],

        ];
        foreach ($permission as $item) {
            \App\permission::create($item);
        }

        $languages = [
            [
                'id' => '1',
                'name' => 'Arabic',
                'icon' => 'languages/english.png',
                'status' => '1',
                'userId' => '1'
            ],
            [
                'id' => '2',
                'name' => 'English',
                'icon' => 'languages/arabic.png',
                'status' => '1',
                'userId' => '1'
            ],
        ];
        foreach ($languages as $item) {
            \App\languages::create($item);
        }

        $currencies = [
            [
                'id' => 1,
                'name' => 'USD',
                'code' => '#123',
                'usd' => '1',
                'gbp' => '2',
                'eur' => '3',
                'cad' => '4',
                'aud' => '5',
                'nzd' => '6',
                'sar' => '7',
                'aed' => '8',
                'kwd' => '9',
                'sar' => '10',
                'omr' => '11',
                'bhd' => '12',
                'jod' => '13',
                'qar' => '14',
                'myr' => '15',
                'try' => '16',
                'egp' => '17',
            ],
            [
                'id' => 2,
                'name' => 'GBP',
                'code' => '#321',
                'usd' => '1',
                'gbp' => '2',
                'eur' => '3',
                'cad' => '4',
                'aud' => '5',
                'nzd' => '6',
                'sar' => '7',
                'aed' => '8',
                'kwd' => '9',
                'sar' => '10',
                'omr' => '11',
                'bhd' => '12',
                'jod' => '13',
                'qar' => '14',
                'myr' => '15',
                'try' => '16',
                'egp' => '17',
            ],
            [
                'id' => 3,
                'name' => 'EUR',
                'code' => '#213',
                'usd' => '1',
                'gbp' => '2',
                'eur' => '3',
                'cad' => '4',
                'aud' => '5',
                'nzd' => '6',
                'sar' => '7',
                'aed' => '8',
                'kwd' => '9',
                'sar' => '10',
                'omr' => '11',
                'bhd' => '12',
                'jod' => '13',
                'qar' => '14',
                'myr' => '15',
                'try' => '16',
                'egp' => '17',
            ],
            [
                'id' => 4,
                'name' => 'CAD',
                'code' => '#312',
                'usd' => '1',
                'gbp' => '2',
                'eur' => '3',
                'cad' => '4',
                'aud' => '5',
                'nzd' => '6',
                'sar' => '7',
                'aed' => '8',
                'kwd' => '9',
                'sar' => '10',
                'omr' => '11',
                'bhd' => '12',
                'jod' => '13',
                'qar' => '14',
                'myr' => '15',
                'try' => '16',
                'egp' => '17',
            ],
        ];
        foreach ($currencies as $item) {
            \App\currency::create($item);
        }
        $visas = [
            [
                'id' => 1,
                'titleAr' => 'عربي',
                'titleEN' => 'English',
                'country' => '1',
                'weekForm' => '12',
                'weekTo' => '15',
                'fee' => 150,
                'minHours' => '20',
                'maxHours' => '43',
                'userId' => '1',
            ],
            [
                'id' => 2,
                'titleAr' => 'سفرية ',
                'titleEN' => 'English',
                'country' => '1',
                'weekForm' => '2',
                'weekTo' => '9',
                'fee' => 150,
                'minHours' => '5',
                'maxHours' => '15',
                'userId' => '1',
            ],
            [
                'id' => 3,
                'titleAr' => 'طالب ',
                'titleEN' => 'English',
                'country' => '1',
                'weekForm' => '1',
                'weekTo' => '6',
                'fee' => 150,
                'minHours' => '7',
                'maxHours' => '18',
                'userId' => '1',
            ],
            [
                'id' => 4,
                'titleAr' => 'جديد',
                'titleEN' => 'English',
                'country' => '1',
                'weekForm' => '1',
                'weekTo' => '5',
                'fee' => 150,
                'minHours' => '2',
                'maxHours' => '7',
                'userId' => '1',
            ],
        ];
        foreach ($visas as $item) {
            \App\visa::create($item);
        }
        $countries = [
            [
                'titleEn' => 'united states',
                'titleAr' => 'الولايات المتحدة',
                'slug' => 'united-states',
                'image' => 'countries/usa.jpg',
                'featured' => 2,
                'status' => 1,
                'userId'  => 1,
            ],
            [
                'titleEn' => 'united kingdom',
                'titleAr' => 'المملكة المتحدة',
                'slug' => 'united-kingdom',
                'image' => 'countries/uk.jpg',
                'featured' => 1,
                'status' => 2,
                'userId'  => 1,
            ],
        ];

        foreach ($countries as $item) {
            \App\countries::create($item);
        }


        $cities = [
            [
                'titleAr' => 'لندن',
                'titleEn' => 'London',
                'slug' => 'London',
                'country' => '2',
                'population' => '12345',
                'contentAr' => 'مدينة لندن ... جارري الكتابة ....',
                'contentEn' => 'London City of UK :) ... Keep write',
                'status' => '1',
                'userId' => '1',
            ],
            [
                'titleAr' => 'نيويورك',
                'titleEn' => 'New York',
                'slug' => 'New-York',
                'country' => '1',
                'population' => '12345',
                'contentAr' => 'مدينة نيويورك ... جارري الكتابة ....',
                'contentEn' => 'New York City of USA :) ... Keep write',
                'status' => '1',
                'userId' => '1',
            ],
        ];
        foreach ($cities as $item) {
            \App\city::create($item);
        }


        $imageCities = [
            [
                'id' => '1',
                'type' => '1',
                'city' => '2',
                'userId' => '1',
                'file' => 'imageCities/new-york.jpg'
            ],
            [
                'id' => '2',
                'type' => '2',
                'city' => '2',
                'userId' => '1',
                'file' => '2i2khp_npdE'
            ],

            [
                'id' => '3',
                'type' => '1',
                'city' => '1',
                'userId' => '1',
                'file' => 'imageCities/london.jpg'
            ],
            [
                'id' => '4',
                'type' => '2',
                'city' => '1',
                'userId' => '1',
                'file' => '2i2khp_npdE'
            ],
        ];
        foreach ($imageCities as $item) {
            \App\imageCity::create($item);
        }
        $pages = [
            [
                'id' => 1,
                'titleEn' => 'COPYRIGHT',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 2,
                'titleEn' => 'LEGAL',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 3,
                'titleEn' => 'POLICIES',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 4,
                'titleEn' => 'COOKIES',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 5,
                'titleEn' => 'Site Map',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 6,
                'titleEn' => 'FAQ',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 7,
                'titleEn' => 'Language test',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 8,
                'titleEn' => 'Feedback',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 9,
                'titleEn' => 'Contact Us',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 10,
                'titleEn' => 'Why book with us ?',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 11,
                'titleEn' => 'Terms & Conditions',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 12,
                'titleEn' => 'Refund policy',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 13,
                'titleEn' => 'Work With Us',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 14,
                'titleEn' => 'Our Partners',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 15,
                'titleEn' => 'Who we are',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 16,
                'titleEn' => 'About us',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
            [
                'id' => 17,
                'titleEn' => 'How to book your Course	',
                'titleAr' => 'حق النشر',
                'slugEn' => 'copyright',
                'slugAr' => 'حق-النشر',
                'image' => 'pages/01.jpg',
                'contentEn' => 'Up is opinion message manners correct hearing husband my. Disposing commanded dashwoods cordially depending at at.Its strangers who you certainty earnestly resources suffering she.Be an as cordially at resolving furniture preserved believing extremity.Easy mr pain felt in.Too northward affection additions nay. He no an nature ye talent houses wisdom vanity denied.',
                'contentAr' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق " ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.',
                'userId' => '1',
            ],
        ];
        foreach ($pages as $item) {
            \App\pages::create($item);
        }

        $services = [
            [
                'id' => '1',
                'titleEn' => 'This New',
                'titleAr' => 'عنوان عربي',
                'pageTitleAr' => 'عنوان الصفحة عربي',
                'pageTitleEn' => 'Title Page English',
                'icon' => 'service/icon/01.png',
                'shortDescriptionAr' => 'وصف قصير',
                'shortDescriptionEn' => 'Short Description English',
                'slugEn' => 'Slug-En1',
                'slugAr' => 'سلق-عربي1',
                'image' => 'services/image/01.jpg',
                'contentEn' => 'Content English',
                'contentAr' => 'المحتوى عربي',
                'userId' => 1,
                'brochure' => 'services/brochure/brochure.pdf'
            ],
            [
                'id' => '2',
                'titleEn' => 'This New',
                'titleAr' => 'عنوان عربي',
                'pageTitleAr' => 'عنوان الصفحة عربي',
                'pageTitleEn' => 'Title Page English',
                'icon' => 'service/icon/01.png',
                'shortDescriptionAr' => 'وصف قصير',
                'shortDescriptionEn' => 'Short Description English',
                'slugEn' => 'Slug-En2',
                'slugAr' => 'سلق-عربي2',
                'image' => 'services/image/01.jpg',
                'contentEn' => 'Content English',
                'contentAr' => 'المحتوى عربي',
                'userId' => 1,
                'brochure' => 'services/brochure/brochure.pdf'
            ],
            [
                'id' => '3',
                'titleEn' => 'This New',
                'titleAr' => 'عنوان عربي',
                'pageTitleAr' => 'عنوان الصفحة عربي',
                'pageTitleEn' => 'Title Page English',
                'icon' => 'service/icon/01.png',
                'shortDescriptionAr' => 'وصف قصير',
                'shortDescriptionEn' => 'Short Description English',
                'slugEn' => 'Slug-En3',
                'slugAr' => 'سلق-عربي3',
                'image' => 'services/image/01.jpg',
                'contentEn' => 'Content English',
                'contentAr' => 'المحتوى عربي',
                'userId' => 1,
                'brochure' => 'services/brochure/brochure.pdf'
            ],
        ];

        foreach ($services as $item) {
            \App\services::create($item);
        }
        $mainpages = [
            [
                'id' => 1,
                'option' => 'mainImage',
                'value' => 'site/mainpage/mainImage.png',
                'userId' => '1'
            ],

            [
                'id' => 2,
                'option' => 'smallTitleEn',
                'value' => 'Live The Language And Experience The Culture',
                'userId' => '1'
            ],
            [
                'id' => 3,
                'option' => 'smallTitleAr',
                'value' => 'تعلم اللغة وعِش التجربة، ابحث الآن',
                'userId' => '1'
            ],

            [
                'id' => 4,
                'option' => 'bigTitleEn',
                'value' => 'Go with PickUpCourse',
                'userId' => '1'
            ],
            [
                'id' => 5,
                'option' => 'bigTitleAr',
                'value' => 'ابدأ مع بيك أب كورس',
                'userId' => '1'
            ],

            [
                'id' => 6,
                'option' => 'featureOneTitleEn',
                'value' => 'We ﬁnd better deals',
                'userId' => '1'
            ],
            [
                'id' => 7,
                'option' => 'featureOneTitleAr',
                'value' => 'نوفر أفضل العروض',
                'userId' => '1'
            ],
            [
                'id' => 8,
                'option' => 'featureOneDescEn',
                'value' => 'Over 2,500 language courses and Packages worldwide',
                'userId' => '1'
            ],
            [
                'id' => 9,
                'option' => 'featureOneDescAr',
                'value' => 'أكثر من 2,500 دورة لغة وباقة في انحاء العالم',
                'userId' => '1'
            ],
            [
                'id' => 10,
                'option' => 'featureOneIcon',
                'value' => 'pages/featureOneIcon.png',
                'userId' => '1'
            ],

            [
                'id' => 11,
                'option' => 'featureTwoTitleEn',
                'value' => 'Best price guaranteed',
                'userId' => '1'
            ],
            [
                'id' => 12,
                'option' => 'featureTwoTitleAr',
                'value' => 'ضمان أقل الأسعار',
                'userId' => '1'
            ],
            [
                'id' => 13,
                'option' => 'featureTwoDescEn',
                'value' => 'We Provide the lowest price with a discount of up ...',
                'userId' => '1'
            ],
            [
                'id' => 14,
                'option' => 'featureTwoDescAr',
                'value' => 'نوفر أقل الأسعار بخصومات تصل إلى 40% على الرسوم ال...',
                'userId' => '1'
            ],
            [
                'id' => 15,
                'option' => 'featureTwoIcon',
                'value' => 'pages/featureTwoIcon.png',
                'userId' => '1'
            ],

            [
                'id' => 16,
                'option' =>  'featureThreeTitleEn',
                'value' => 'Students love us',
                'userId' => '1'
            ],
            [
                'id' => 17,
                'option' => 'featureThreeTitleAr',
                'value' => 'الطلاب يفضلونا',
                'userId' => '1'
            ],
            [
                'id' => 18,
                'option' => 'featureThreeDescEn',
                'value' => 'We provide continuous support to students before a...',
                'userId' => '1'
            ],
            [
                'id' => 19,
                'option' => 'featureThreeDescAr',
                'value' => 'نوفر الدعم الكامل للطالب قبل وخلال وبعد رحلة الدرا...',
                'userId' => '1'
            ],
            [
                'id' => 20,
                'option' => 'featureThreeIcon',
                'value' => 'pages/featureThreeIcon.png',
                'userId' => '1'
            ],
        ];
        foreach ($mainpages as $item) {
            \App\mainpages::create($item);
        }


        $footer = [
            [
                'id' => 1,
                'option' => 'workDaysFrom',
                'value' => 'Mon-Fri | 8.30am-6:30pm',
                'userId' => 1
            ],
            [
                'id' => 2,
                'option' => 'workDaysTo',
                'value' => 'Mon-Fri | 8.30am-6:30pm',
                'userId' => 1
            ],

            [
                'id' => 3,
                'option' => 'aboutCompanyTitleEn',
                'value' => 'About Company',
                'userId' => 1
            ],
            [
                'id' => 4,
                'option' => 'aboutCompanyTitleAr',
                'value' => 'عن الشركة',
                'userId' => 1
            ],

            [
                'id' => 5,
                'option' => 'generalInformationEn',
                'value' => 'General Information',
                'userId' => 1
            ],
            [
                'id' => 6,
                'option' => 'generalInformationAr',
                'value' => 'معلومات عامة',
                'userId' => 1
            ],

            [
                'id' => 7,
                'option' => 'customerServiceTitleEn',
                'value' => 'عنوان خدمة العملاء',
                'userId' => 1
            ],
            [
                'id' => 8,
                'option' => 'customerServiceTitleAr',
                'value' => 'customer Service Title',
                'userId' => 1
            ],

            [
                'id' => 9,
                'option' => 'newsletterSocialDesEn',
                'value' => 'Newsletter & Social description',
                'userId' => 1
            ],
            [
                'id' => 10,
                'option' => 'newsletterSocialDesAr',
                'value' => 'النشرة الإخبارية والوصف الاجتماعي',
                'userId' => 1
            ],

        ];



        foreach ($footer as $item) {
            \App\footer::create($item);
        }

        $leads = [
            [
                'id' => 1,
                'fName' => 'Ahmad Ali',
                'lName' => '',
                'email' => 'i@i.co',
                'phone' => '0599999999',
                'nationality' => '1',
                'placeOfResidence' => '1',
                'notes' => 'This Is my Notes',
                'destination' => 1,
                'invoice' => '',
                'device' => 'Device Type:',
                'currency' => '',
                'type' => '1',
                'userId' => 1,

            ],
            [
                'id' => 2,
                'fName' => 'Ahmad ',
                'lName' => 'Ali',
                'email' => 'i@i.co',
                'phone' => '0599999999',
                'nationality' => '1',
                'placeOfResidence' => '1',
                'notes' => 'This Is my Notes',
                'destination' => 1,
                'invoice' => 'http://google.com',
                'device' => 'Device Type:',
                'currency' => 'MAD',
                'type' => '2',

            ],

            [
                'id' => 3,
                'fName' => 'Ahmad Ali',
                'lName' => '',
                'email' => 'i@i.co',
                'phone' => '0599999999',
                'nationality' => '1',
                'placeOfResidence' => '1',
                'notes' => 'This Is my Notes',
                'destination' => 1,
                'invoice' => 'http://google.com',
                'device' => 'Device Type:',
                'currency' => 'MAD',
                'type' => '3',
            ],
            [
                'id' => 4,
                'fName' => 'Ahmad Ali',
                'lName' => '',
                'email' => 'i@i.co',
                'phone' => '0599999999',
                'nationality' => '1',
                'placeOfResidence' => '1',
                'notes' => 'This Is my Notes',
                'destination' => 1,
                'type' => '4',
            ],
            [
                'id' => 5,
                'fName' => 'Ahmad Ali',
                'lName' => '',
                'email' => 'i@i.co',
                'phone' => '0599999999',
                'nationality' => '1',
                'placeOfResidence' => '1',
                'notes' => 'This Is my Notes',
                'type' => '5',
                'institution' => 'institution',

            ],
            [
                'id' => 6,
                'fName' => 'Ahmad Ali',
                'lName' => '',
                'email' => 'i@i.co',
                'phone' => '0599999999',
                'notes' => 'This Is my Notes',
                'type' => '6',
            ],
            [
                'id' => 7,
                'fName' => 'Ahmad Ali',
                'lName' => '',
                'email' => 'i@i.co',
                'phone' => '0599999999',
                'notes' => 'This Is my Notes',
                'type' => '7',
                'subject' => 'Subject',
            ],
            [
                'id' => 8,
                'fName' => 'Ahmad Ali',
                'lName' => '',
                'email' => 'i@i.co',
                'phone' => '0599999999',
                'notes' => 'This Is my Notes',
                'type' => '8',
            ],
            [
                'id' => 9,
                'fName' => 'Ahmad Ali',
                'lName' => '',
                'email' => 'i@i.co',
                'phone' => '0599999999',
                'notes' => 'This Is my Notes',
                'type' => '9',
            ],
            [
                'id' => 10,
                'email' => 'i@i.co',
                'type' => '10',
            ],
        ];


        foreach ($leads as $item) {
            \App\leads::create($item);
        }


        $articles = [
            [
                'id' => '1',
                'titleAr' => '1',
                'titleEn' => '1',
                'slugAr' => '1',
                'slugEn' => '1',
                'metaDescriptionEn' => '1',
                'metaDescriptionAr' => '1',
                'pageTitleAr' => '1',
                'pageTitleEn' => '1',
                'image' => '1',
                'contentEn' => '1',
                'contentAr' => '1',
                'featured' => 1,
                'status' => '1',
                'userId' => '1',
            ],
            [
                'id' => '2',
                'titleAr' => '2',
                'titleEn' => '2',
                'slugAr' => '2',
                'slugEn' => '2',
                'metaDescriptionEn' => '2',
                'metaDescriptionAr' => '2',
                'pageTitleAr' => '2',
                'pageTitleEn' => '2',
                'image' => '2',
                'contentEn' => '2',
                'contentAr' => '2',
                'featured' => 2,
                'status' => '2',
                'userId' => '1',
            ],
        ];



        foreach ($articles as $item) {
            \App\articles::create($item);
        }

        $packages  = [
            [
                'id' => 1,
                'country' => '1',
                'city' => '1',
                'school' => '1',
                'courseType' => 'course Type',
                'lessonWeek' => '2/7',
                'duration' => '10',
                'accommodationType' => 'Scholastic',
                'roomType' => 'Single',
                'mealsType' => 'half-board',
                'airportPickUp' => 'One Way',
                'healthInsurance' => 'yes',
                'studentVisa' => 'yes',
                'featured' => '1',
                'fee' => '120',
                'otherType' => 'otherType|otherType|otherType',
                'feeDiscount' => '100',
                'userId' => 1,
            ],
        ];


        foreach ($packages as $item) {
            \App\packages::create($item);
        }


        $schools = [
            [
                'id' => '1',
                'titleAr' => 'مدرسة 1',
                'titleEn' => 'school 1',
                'featuredMainPage' => '1',
                'featuredCityPage' => '1',
                'currency' => '1',
                'country' => '1',
                'city' => '1',
                'latitude' => '-33.915169',
                'longitude' => '-73.027890',
                'logo' => 'schools/Logo/01.jpg',
                'rating' => '5',
                'registrationFee' => '110',
                'status' => '1',
                'userId'  => '1',
            ],
        ];


        foreach ($schools as $item) {
            \App\schools::create($item);
        }


        $filesSchool = [
            [
                'id' => '1',
                'school' => '1',
                'type' => '1',
                'file' => 'schools/photos/01.jpg',
                'userId' => '1'
            ],
            [
                'id' => '2',
                'school' => '1',
                'type' => '2',
                'file' => '2i2khp_npdE',
                'userId' => '1'
            ],
        ];

        foreach ($filesSchool as $item) {
            \App\filesSchool::create($item);
        }
        $contentschools = [
            [
                'id' => 1,
                'school' => 1,
                'slugAr' => 'Arabic',
                'slugEn' => 'Slug-En',
                'descriptionEn' => 'descriptionEn',
                'descriptionAr' => 'descriptionAr',
                'pageTitleEn' => 'pageTitleEn',
                'pageTitleAr' => 'pageTitleAr',
                'metaDescriptionEn' => 'metaDescriptionEn',
                'metaDescriptionAr' => 'metaDescriptionAr',
                'userId' => 1
            ],
        ];
        foreach ($contentschools as $item) {
            \App\contentschools::create($item);
        }




        $coursesSchool = [
            [
                'id' => 1,
                'school' => 1,
                'titleEn' => 'titleEn',
                'titleAr' => 'titleAr',
                'minBookingWeeks' => 4,
                'maxStudents' => 20,
                'minAge' => 19,
                'hoursPerWeek' => '20/25',
                'lessonsPerWeek' => '10',
                'shortCourseType' => 3,
                'courierFees' => '720',
                'materialFeeType' => 3,
                'materialFeeAmount' => '100',
                'userId' => 1,
                'status' => 1
            ],
        ];
        foreach ($coursesSchool as $item) {
            \App\coursesSchool::create($item);
        }

        $i1 = 1;
        $coursesfees = [
            [
                'id' => $i1++,
                'fromWeek' => 1,
                'toWeek' => 10,
                'userId' => 1,
                'course' => 1,
                'fee' => 200,
            ],
            [
                'id' => $i1++,
                'fromWeek' => 10,
                'toWeek' => 20,
                'userId' => 1,
                'course' => 1,
                'fee' => 400,
            ],
        ];


        foreach ($coursesfees as $item) {
            \App\coursesfees::create($item);
            \App\materialType::create($item);
        }






        $CourseType = [
            [
                'id' => 1,
                'titleEn' => 'General English Course',
                'titleAr' => 'دورة اللغة الإنجليزية العامة',
                'status' => 1,
                'userId' => 1
            ],
            [
                'id' => 2,
                'titleEn' => 'Intensive English Course',
                'titleAr' => 'دورة اللغة الإنجليزية المكثفة',
                'status' => 1,
                'userId' => 1
            ],

            [
                'id' => 3,
                'titleEn' => 'IELTS Preparation Course',
                'titleAr' => 'دورة التحضير لامتحان IELTS',
                'status' => 1,
                'userId' => 1
            ],
            [
                'id' => 4,
                'titleEn' => 'TOEFL Preparation Course',
                'titleAr' => 'دورة التحضير لامتحان TOEFL',
                'status' => 1,
                'userId' => 1
            ],

            [
                'id' => 5,
                'titleEn' => 'Business English Course',
                'titleAr' => 'دورة اللغة الإنجليزية للأعمال',
                'status' => 1,
                'userId' => 1
            ],
            [
                'id' => 6,
                'titleEn' => 'Academic English Course',
                'titleAr' => 'دورة اللغة الإنجليزية للأعمال',
                'status' => 1,
                'userId' => 1
            ],
        ];

        foreach ($CourseType as $item) {
            \App\CourseType::create($item);
        }






        $roomTypes = [
            [
                'id' => 1,
                'titleAr' => 'غرفة فردية',
                'titleEn' => 'Single Room',
                'userId' => 1,
                'status' => 1
            ],
            [
                'id' => 2,
                'titleAr' => 'غرفة مشتركة',
                'titleEn' => 'Shared Room',
                'userId' => 1,
                'status' => 1
            ],
        ];
        foreach ($roomTypes as $item) {
            \App\roomType::create($item);
        }

        $facilities = [
            [
                'id' => 1,
                'titleAr' => 'حمام خاص',
                'titleEn' => 'Private Bathroom',
                'userId' => 1,
                'status' => 1
            ],
            [
                'id' => 2,
                'titleAr' => 'غرفة فردية',
                'titleEn' => 'Shared kitchen',
                'userId' => 1,
                'status' => 1
            ],
        ];
        foreach ($facilities as $item) {
            \App\facilitie::create($item);
        }



        $accommodationtypes = [
            [
                'id' => 1,
                'titleAr' => 'الإقامة',
                'titleEn' => 'Homestay',
                'userId' => 1,
                'status' => 1
            ],
            [
                'id' => 2,
                'titleAr' => 'سكن الطلاب',
                'titleEn' => 'student Residence',
                'userId' => 1,
                'status' => 1
            ],
            [
                'id' => 3,
                'titleAr' => 'فندق وشقة',
                'titleEn' => 'Hotel & Apartment',
                'userId' => 1,
                'status' => 1
            ],
        ];
        foreach ($accommodationtypes as $item) {
            \App\accommodationType::create($item);
        }


        $mealtypes = [
            [
                'id' => 1,
                'titleAr' => 'فارغ',
                'titleEn' => 'none',
                'userId' => 1,
                'status' => 1
            ],
            [
                'id' => 2,
                'titleAr' => 'الاعتماد على النفس فى تجهيز الوجبات',
                'titleEn' => 'Self-Catering',
                'userId' => 1,
                'status' => 1
            ],
            [
                'id' => 3,
                'titleAr' => 'سرير و فطور',
                'titleEn' => 'Bed & Breakfast',
                'userId' => 1,
                'status' => 1
            ],
            [
                'id' => 4,
                'titleAr' => 'نصف إقامة',
                'titleEn' => 'Half-Board',
                'userId' => 1,
                'status' => 1
            ],
            [
                'id' => 5,
                'titleAr' => 'إقامة كاملة',
                'titleEn' => 'Full-Board',
                'userId' => 1,
                'status' => 1
            ],
        ];
        foreach ($mealtypes as $item) {
            \App\mealType::create($item);
        }


        $accommodations = [
            [
                'id' => 1,
                'school' => 1,
                'titleEn' => 'EEEN',
                'titleAr' => 'ARRR',
                'accommodationType' => 1,
                'bookingFee' => '200',
                'status' => '1',
                'userId' => 1
            ],
            [
                'id' => 2,
                'titleEn' => 'EEEN',
                'titleAr' => 'ARRR',
                'school' => 1,
                'accommodationType' => 2,
                'bookingFee' => '100',
                'status' => '1',
                'userId' => 1
            ],
        ];
        foreach ($accommodations as $item) {
            \App\accommodation::create($item);
        }
        $accommodationOptions = [
            [
                'id' => 1,
                'accommodation' => 1,
                'room' => 1,
                'meal' => 1,
                'facilitie' => 1,
                'supplement' => 'AAAA',
                'minimumNumberOfWeeksToBook' => 2,
                'accommodationAge' => 16,
                'status' => 1
            ],
        ];
        foreach ($accommodationOptions as $item) {
            \App\accommodationOptions::create($item);
        }
        $airportpickup = [
            [
                'id' => 1,
                'school' => 1,
                'titleEn' => "English",
                'titleAr' => "Arabic",
                'roundWay' => 300,
                'oneWay' => 200,
                'userId' => 1,
            ],
            [
                'id' => 2,
                'school' => 1,
                'titleEn' => "English",
                'titleAr' => "Arabic",
                'roundWay' => 400,
                'oneWay' => 200,
                'userId' => 1,
            ],
        ];
        foreach ($airportpickup as $item) {
            \App\airportPickUp::create($item);
        }

        $insurance = [
            [
                'id' => 1,
                'school' => 1,
                'titleEn' => "English",
                'titleAr' => "Arabic",
                'status' => 1,
                'fee' => 200,
                'userId' => 1,

            ],
            [
                'id' => 2,
                'school' => 1,
                'titleEn' => "English",
                'titleAr' => "Arabic",
                'status' => 0,
                'fee' => 100,
                'userId' => 1,

            ],
        ];
        foreach ($insurance as $item) {
            \App\Insurance::create($item);
        }

        $Promotions = [
            [
                'id' => 1,
                'userId' => 1,
                'type' => 1,
                'for' => 1,
                'validDateFrom' => '2017-02-25',
                'validDateTo' => '2017-02-25',
                'courseBookingFrom' => '2017-02-25',
                'courseBookingTo' => '2017-02-25',

            ],
            [
                'id' => 2,
                'userId' => 1,
                'type' => 1,
                'for' => 1,
                'validDateFrom' => '2017-02-25',
                'validDateTo' => '2017-02-25',
                'courseBookingFrom' => '2017-02-25',
                'courseBookingTo' => '2017-02-25',

            ],
        ];


        foreach ($Promotions as $item) {
            \App\promotion::create($item);
        }

        $multiPromotions = [
            [
                'id' => 1,
                'promotion' => 1,
                'titleAr' => 'ARRR',
                'titleEn' => 'EEEEN',
                'school' => 1,
                'amount' => 200,
                'bookingDurationFrom' => 1,
                'bookingDurationTo' => 3,
                'status' => 1,
            ],
            [
                'id' => 2,
                'promotion' => 1,
                'titleAr' => 'ARRR',
                'titleEn' => 'EEEEN',
                'school' => 1,
                'amount' => 200,
                'bookingDurationFrom' => 1,
                'bookingDurationTo' => 3,
                'status' => 1,
            ],
            [
                'id' => 3,
                'promotion' => 1,
                'titleAr' => 'ARRR',
                'titleEn' => 'EEEEN',
                'school' => 1,
                'amount' => 200,
                'bookingDurationFrom' => 1,
                'bookingDurationTo' => 3,
                'status' => 1,
            ],
            [
                'id' => 4,
                'promotion' => 2,
                'titleAr' => 'ARRR',
                'titleEn' => 'English Title Promotion...',
                'school' => 1,
                'amount' => 200,
                'bookingDurationFrom' => 1,
                'bookingDurationTo' => 3,
                'status' => 1,
            ],
            [
                'id' => 5,
                'promotion' => 2,
                'titleAr' => 'ARRR',
                'titleEn' => 'EEEEN',
                'school' => 1,
                'amount' => 200,
                'bookingDurationFrom' => 1,
                'bookingDurationTo' => 3,
                'status' => 1,
            ],
        ];

        foreach ($multiPromotions as $item) {
            \App\multiPromotions::create($item);
        }
        $i = 1;
        $nationality =    [
            ['id' => $i++, 'status' => 1, 'titleAr' => 'أفغانستان', 'titleEn' => 'Afghanistan',],
            ['id' => $i++, 'status' => 1, 'titleAr' => 'برمودا', 'titleEn' => 'Bermuda',],
            ['id' => $i++, 'status' => 1, 'titleAr' => 'بوتان', 'titleEn' => 'Bhutan',],
            ['id' => $i++, 'status' => 1, 'titleAr' => 'بوليفيا', 'titleEn' => 'Bolivia',],
        ];

        foreach ($nationality as $item) {
            \App\nationalities::create($item);
        }

        $ii = 1;
        $residences = [
            [
                'id' => $ii++, 'status' => 1, 'titleAr' => 'Arabic', 'titleEn' => 'English'
            ],
            [
                'id' => $ii++, 'status' => 1, 'titleAr' => 'Arabic', 'titleEn' => 'English'
            ],
            [
                'id' => $ii++, 'status' => 1, 'titleAr' => 'Arabic', 'titleEn' => 'English'
            ],
        ];
        foreach ($residences as $item) {
            \App\residences::create($item);
        }

        $feeweeksoptions = [
            [
                'id' => 1,
                'toWeek' => 1,
                'fromWeek' => 4,
                'option' => 1,
                'userId' => 1,
            ],
        ];
        foreach ($feeweeksoptions as $item) {
            \App\feeWeeksOptions::create($item);
        }
        $partner = [
            [
                'id' => 1,
                'logo' => 'partner/01.png',
                'userId' => '1',
            ]
        ];
        foreach ($partner as $item) {
            \App\partner::create($item);
        }
        $destinations = [
            [
                'titleAr' => 'Arabic',
                'titleEn' => 'English Title',
                'status' => 1,
            ],
            [
                'titleAr' => 'Arabic1',
                'titleEn' => 'English Title1',
                'status' => 0,
            ],
            [
                'titleAr' => 'Arabic2',
                'titleEn' => 'English Title2',
                'status' => 1,
            ],
        ];
        foreach ($destinations as $item) {
            \App\destination::create($item);
        }

        // $accreditation = [
        //     'school' => 1,
        //     'logo' => '/school/accreditation/01.png',
        //     'userId' => 1,
        // ];


        // foreach ($accreditation as $item) {
        //     \App\accreditation::create($item);
        // }
    }
}
