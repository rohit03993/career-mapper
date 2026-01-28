<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    public function run(): void
    {
        $careers = [
            [
                'title' => 'Actuarial Sciences',
                'slug' => 'actuarial-sciences',
                'order' => 1,
                'short_description' => 'Apply statistical and mathematical skills to assess risk in insurance and finance.',
                'content' => "Actuaries are highly paid professionals who use statistical and mathematical skills to assess risk in insurance, finance, and pension sectors. They help organisations make informed decisions about financial security and risk management.\n\nSpecialisations include health insurance, life insurance, property and casualty insurance, pension and retirement benefits, and enterprise risk management.\n\nEducational paths: Fellowship from Actuarial Society of India (ASI) Mumbai or Institute of Actuaries (London); B.Sc. in Insurance or Statistics; M.B.A. in Actuarial Science; Diploma in Actuarial Science.\n\nTop recruiters: Insurance companies, banking and financial institutions, government bodies, consulting firms, and pension funds.\n\nTrending areas: Health insurance, life insurance, data analytics in risk.",
                'features' => [
                    'High demand in insurance and finance sectors',
                    'Strong job security and growth potential',
                    'Opportunities in health, life, and general insurance',
                    'Roles in banking, consulting, and government',
                ],
                'scope' => 'Actuaries work in insurance (health, life, general), banking, pension funds, consulting, and regulatory bodies. Demand is growing with digitalisation and data-driven decision-making.',
                'who_can_pursue' => 'Students strong in mathematics and statistics; graduates in Maths, Statistics, Economics, or Commerce. Clearance of actuarial exams (ASI/IFoA) is essential.',
                'what_you_get' => 'Stable, well-paying careers with clear progression. Roles as Actuary, Risk Analyst, Underwriter, or Consultant in top firms.',
            ],
            [
                'title' => 'Allied Medicine',
                'slug' => 'allied-medicine',
                'order' => 2,
                'short_description' => 'Healthcare professions that support diagnosis, treatment, and patient care.',
                'content' => "Allied health professionals work alongside doctors and nurses to deliver healthcare. They include physiotherapists, radiographers, lab technologists, optometrists, nutritionists, and medical technicians.\n\nEducational paths: B.Sc. in respective streams (Physiotherapy, Radiology, Medical Lab Technology, Optometry, Nutrition); Diploma courses; certification programmes.\n\nTop recruiters: Hospitals, clinics, diagnostic centres, fitness centres, pharmaceutical companies, and government health departments.\n\nTrending areas: Telehealth support, geriatric care, sports medicine, and preventive healthcare.",
                'features' => [
                    'Diverse roles in healthcare beyond MBBS',
                    'Growing demand in hospitals and diagnostics',
                    'Options in clinical, research, and teaching',
                    'Alignment with NEP and skill-based education',
                ],
                'scope' => 'Jobs in hospitals, nursing homes, diagnostic labs, rehabilitation centres, sports clubs, and public health. Rising healthcare spending drives demand.',
                'who_can_pursue' => 'Class 12 (Science stream, preferably PCB). Interest in biology, patient care, and technical skills.',
                'what_you_get' => 'Stable careers in healthcare with opportunities for specialisation, higher studies, and entrepreneurship (e.g. own clinic or lab).',
            ],
            [
                'title' => 'Animation & Graphics',
                'slug' => 'animation-graphics',
                'order' => 3,
                'short_description' => 'Create visual content for films, games, advertising, and digital media.',
                'content' => "Animation and graphics professionals create 2D/3D visuals for films, gaming, advertising, web, and mobile apps. Roles include animator, VFX artist, graphic designer, and motion designer.\n\nEducational paths: B.Sc. / B.A. in Animation, Graphic Design, or Multimedia; Diploma in Animation & VFX; short-term courses in tools like Maya, Blender, After Effects.\n\nTop recruiters: Animation studios, gaming companies, ad agencies, OTT platforms, e-learning firms, and startups.\n\nTrending areas: 3D animation, VFX for OTT, game design, and AR/VR content.",
                'features' => [
                    'Creative and technology-driven careers',
                    'Strong presence in films, gaming, and ads',
                    'Freelance and remote work possibilities',
                    'Growth in OTT and digital content',
                ],
                'scope' => 'Film, TV, OTT, gaming, advertising, e-learning, and social media. India is a hub for outsourcing and original content.',
                'who_can_pursue' => 'Class 12 (any stream). Interest in art, design, and software. Portfolio matters more than degree alone.',
                'what_you_get' => 'Creative roles with flexible work options. Potential to work with global studios and build a freelance career.',
            ],
            [
                'title' => 'Applied Arts',
                'slug' => 'applied-arts',
                'order' => 4,
                'short_description' => 'Apply artistic skills to design, advertising, and commercial projects.',
                'content' => "Applied arts blend creativity with practical use—advertising, packaging, typography, illustration, and brand design. Professionals work in agencies, brands, and publications.\n\nEducational paths: B.F.A. / B.Des. in Applied Arts, Graphic Design, or Visual Communication; Diploma in Design; portfolio-based short courses.\n\nTop recruiters: Ad agencies, design studios, FMCG brands, publishing houses, and digital marketing firms.\n\nTrending areas: Brand identity, UX/UI support, social media design, and experiential design.",
                'features' => [
                    'Art meets commerce and branding',
                    'Roles in ads, packaging, and digital',
                    'Portfolio-led hiring',
                    'Freelance and agency options',
                ],
                'scope' => 'Advertising, branding, packaging, publishing, web, and social media. Every brand needs visual identity and campaign design.',
                'who_can_pursue' => 'Class 12 (any stream). Strong visual sense, creativity, and familiarity with design software.',
                'what_you_get' => 'Designer roles in agencies or in-house teams, with scope for freelancing and teaching.',
            ],
            [
                'title' => 'Architecture',
                'slug' => 'architecture',
                'order' => 5,
                'short_description' => 'Design buildings, spaces, and environments for living and working.',
                'content' => "Architects plan and design buildings, landscapes, and interiors. They combine creativity with technical knowledge of structure, materials, and regulations.\n\nEducational paths: B.Arch. (5 years, after Class 12 with Maths); M.Arch. for specialisation; CoA registration required to practise.\n\nTop recruiters: Architecture firms, real estate developers, government (CPWD, housing boards), NGOs, and interior design studios.\n\nTrending areas: Sustainable design, smart cities, interior architecture, and heritage conservation.",
                'features' => [
                    'Blend of creativity and engineering',
                    'Stable demand in real estate and infra',
                    'Options in urban planning and interiors',
                    'Recognition via design awards and projects',
                ],
                'scope' => 'Residential, commercial, institutional, and public projects. Urbanisation and infra growth keep demand strong.',
                'who_can_pursue' => 'Class 12 with Mathematics. NATA or JEE (B.Arch.) for B.Arch. admission. Drawing and spatial aptitude help.',
                'what_you_get' => 'Licensed practice as architect, roles in firms or government, or your own design studio.',
            ],
            [
                'title' => 'Aviation',
                'slug' => 'aviation',
                'order' => 6,
                'short_description' => 'Careers in flying, aircraft maintenance, and airport operations.',
                'content' => "Aviation covers pilots, aircraft engineers, air traffic controllers, and airport management. India is one of the fastest-growing aviation markets.\n\nEducational paths: Commercial Pilot Licence (CPL); B.E. / B.Tech. in Aeronautical Engineering; Diploma in Aviation; DGCA-approved training.\n\nTop recruiters: Airlines (IndiGo, Air India, SpiceJet, etc.), airport operators, MRO (maintenance) firms, and defence.\n\nTrending areas: Drone operations, aviation sustainability, and regional connectivity.",
                'features' => [
                    'Flying, engineering, and management roles',
                    'Global mobility and travel',
                    'Strong growth in domestic aviation',
                    'Defence and drone opportunities',
                ],
                'scope' => 'Airlines, airports, MRO, cargo, defence, and drone sector. Expansion of fleet and airports fuels hiring.',
                'who_can_pursue' => 'Class 12 (Science for pilot/engineering). Medical fitness and DGCA compliance for pilots. Technical aptitude for engineering.',
                'what_you_get' => 'Pilot, engineer, ATC, or airport manager roles with attractive pay and travel benefits.',
            ],
            [
                'title' => 'Cabin Crew',
                'slug' => 'cabin-crew',
                'order' => 7,
                'short_description' => 'Ensure passenger safety and comfort on flights as cabin crew.',
                'content' => "Cabin crew members serve and ensure safety of passengers on flights. They handle emergencies, first aid, and in-flight service. Airlines hire through open recruitment and training programmes.\n\nEducational paths: Class 12 (any stream); Diploma or certificate in Aviation, Hospitality, or Cabin Crew; airline-specific training.\n\nTop recruiters: Domestic and international airlines, chartered operators, and luxury travel services.\n\nTrending areas: Premium and long-haul services, inflight retail, and customer experience roles.",
                'features' => [
                    'Travel-based job with people contact',
                    'Structured training and grooming',
                    'Flexible roster and layovers',
                    'Path to ground staff or supervisory roles',
                ],
                'scope' => 'Airlines, private jets, and travel hospitality. Growth in aviation directly increases cabin crew demand.',
                'who_can_pursue' => 'Class 12. Height, weight, and vision norms as per airline. Good communication, grooming, and teamwork.',
                'what_you_get' => 'Cabin crew roles with travel, allowances, and progression to senior crew or ground operations.',
            ],
            [
                'title' => 'Civil Services',
                'slug' => 'civil-services',
                'order' => 8,
                'short_description' => 'Serve the nation through administration, policy, and public governance.',
                'content' => "Civil services include IAS, IPS, IFS, and other Central and State services. Officers lead policy, administration, and delivery of public programmes.\n\nEducational paths: Graduation (any discipline). UPSC CSE for All India Services; State PSC for state civil services. Optional coaching for exams.\n\nTop recruiters: Government of India, State Governments, PSUs, and regulatory bodies.\n\nTrending areas: Digital governance, district administration, and sector-specific roles (health, education, infrastructure).",
                'features' => [
                    'Prestige, impact, and job security',
                    'Diverse postings and roles',
                    'Policy and implementation exposure',
                    'Scope for innovation in governance',
                ],
                'scope' => 'District administration, ministries, PSUs, and diplomatic missions. Promotions and deputations add variety.',
                'who_can_pursue' => 'Graduates (any stream). Adequate age limit as per UPSC/State PSC. Rigorous preparation for written and interview stages.',
                'what_you_get' => 'Stable, respected careers with authority to drive change in public systems.',
            ],
            [
                'title' => 'Commerce & Accounts',
                'slug' => 'commerce-accounts',
                'order' => 9,
                'short_description' => 'Careers in accounting, finance, taxation, and business management.',
                'content' => "Commerce and accounts cover chartered accountancy, company secretaryship, cost accountancy, and corporate finance. Professionals manage books, audits, tax, and compliance.\n\nEducational paths: B.Com., M.Com.; CA (ICAI); CS (ICSI); CMA (ICMAI); CFA; MBA (Finance).\n\nTop recruiters: CA firms, corporates, banks, Big 4, insurance, and government (CAG, tax departments).\n\nTrending areas: GST, forensic accounting, fintech, and ESG reporting.",
                'features' => [
                    'Clear qualification ladder (CA, CS, CMA)',
                    'Demand in every industry',
                    'Practice or employment options',
                    'Strong earning potential',
                ],
                'scope' => 'Audit, tax, finance, legal compliance, and consulting. Every company needs accounts and compliance.',
                'who_can_pursue' => 'Class 12 (Commerce preferred). Numeracy, attention to detail, and persistence for professional exams.',
                'what_you_get' => 'CA/CS/CMA credentials, roles in industry or practice, and senior finance leadership positions.',
            ],
            [
                'title' => 'Computer Application & IT',
                'slug' => 'computer-application-it',
                'order' => 10,
                'short_description' => 'Build software, manage systems, and work in technology-driven roles.',
                'content' => "IT and computer applications cover software development, system administration, cybersecurity, and tech support. India is a global IT outsourcing hub.\n\nEducational paths: B.C.A., B.Tech. (CSE/IT), M.C.A., M.Tech.; certifications (AWS, Microsoft, Cisco, etc.).\n\nTop recruiters: IT services firms (TCS, Infosys, Wipro), product companies, startups, banks, and government IT projects.\n\nTrending areas: Cloud, cybersecurity, DevOps, and enterprise software.",
                'features' => [
                    'Wide range of roles and industries',
                    'Remote and global work options',
                    'Continuous upskilling and certifications',
                    'Startup and product company opportunities',
                ],
                'scope' => 'Software development, IT services, product companies, startups, and digital initiatives across sectors.',
                'who_can_pursue' => 'Class 12 (Science preferred, Maths often required). Logical thinking and interest in programming.',
                'what_you_get' => 'Developer, analyst, or admin roles with strong salaries and growth in tech and non-tech companies.',
            ],
            [
                'title' => 'Data Science & Artificial Intelligence',
                'slug' => 'data-science-artificial-intelligence',
                'order' => 11,
                'short_description' => 'Extract insights from data and build intelligent systems.',
                'content' => "Data scientists and AI/ML engineers analyse data, build models, and create automated solutions. Used in analytics, recommendation systems, and automation.\n\nEducational paths: B.Tech. (CSE, IT) or B.Sc. (Maths, Stats); M.Tech. / M.Sc. in Data Science or AI; online certifications (Coursera, edX, etc.).\n\nTop recruiters: Tech giants, banks, e-commerce, healthcare, and analytics firms. Startups heavily hire for AI/ML.\n\nTrending areas: Gen AI, ML ops, computer vision, and NLP.",
                'features' => [
                    'Among the fastest-growing tech roles',
                    'Applied across industries',
                    'Research and industry both open',
                    'High demand and pay',
                ],
                'scope' => 'Analytics, product tech, research, consulting, and domain-specific AI (health, finance, retail).',
                'who_can_pursue' => 'Strong Maths/Statistics and programming. Degree in CS, Maths, Stats, or related field. Projects and certifications add value.',
                'what_you_get' => 'Data scientist, ML engineer, or analyst roles in product companies, consulting, and research.',
            ],
            [
                'title' => 'Defense',
                'slug' => 'defense',
                'order' => 12,
                'short_description' => 'Serve in the Army, Navy, Air Force, or allied defence organisations.',
                'content' => "Defence careers include armed forces (officers and soldiers), paramilitary, and defence civilian roles. Entries via NDA, CDS, AFCAT, and direct recruitment.\n\nEducational paths: NDA after Class 12; CDS after graduation; AFCAT for flying branch; technical entries for engineers. Training at respective academies.\n\nTop recruiters: Indian Army, Navy, Air Force; CAPF (BSF, CRPF, etc.); DRDO; ordnance factories.\n\nTrending areas: Cyber warfare, space, drone units, and modernisation drives.",
                'features' => [
                    'Discipline, leadership, and service',
                    'Stable career with benefits',
                    'Technical and non-technical entries',
                    'Post-retirement second careers',
                ],
                'scope' => 'Combat, engineering, logistics, medical, and administrative branches. Civilian roles in R&D and production.',
                'who_can_pursue' => 'Varies by entry—Class 12 for NDA; graduation for CDS/AFCAT. Medical and physical standards as per notification.',
                'what_you_get' => 'Commissioned or other ranks, with pension, healthcare, and respect. Options to retire and join corporate or PSUs.',
            ],
            [
                'title' => 'Design',
                'slug' => 'design',
                'order' => 13,
                'short_description' => 'Create products, experiences, and visuals through human-centred design.',
                'content' => "Design spans product, UX/UI, interior, fashion, and communication design. Designers solve problems and shape user experiences across physical and digital products.\n\nEducational paths: B.Des., M.Des. from NID, NIFT, IITs, or private institutes; Diploma in Design; bootcamps for UX/UI.\n\nTop recruiters: Design studios, tech companies, FMCG, automotive, retail, and startups.\n\nTrending areas: UX/UI, design systems, service design, and sustainability-led design.",
                'features' => [
                    'User-centred and creative problem-solving',
                    'Cross-industry demand',
                    'Portfolio and craft matter',
                    'Freelance and in-house options',
                ],
                'scope' => 'Tech products, consumer goods, spaces, branding, and digital experiences. Design maturity is rising in Indian firms.',
                'who_can_pursue' => 'Class 12 (any stream). Design aptitude, curiosity, and visual or spatial sense. NID/NIFT entrance or similar for formal design education.',
                'what_you_get' => 'Designer roles in brands and tech, with potential to lead design teams or run a design practice.',
            ],
            [
                'title' => 'Economics',
                'slug' => 'economics',
                'order' => 14,
                'short_description' => 'Analyse economies, policies, and markets in research, govt, and business.',
                'content' => "Economists analyse data, policies, and markets. They work in central banks, think tanks, government, consultancies, and corporate strategy.\n\nEducational paths: B.A. / B.Sc. Economics; M.A. / M.Sc. Economics; M.Phil. / Ph.D. for research; certifications in econometrics or policy.\n\nTop recruiters: RBI, NITI Aayog, ministries, J-PAL, ISI, universities, banks, and consulting firms.\n\nTrending areas: Data-driven policy, behavioural economics, and development economics.",
                'features' => [
                    'Strong analytical and quantitative focus',
                    'Policy, research, and corporate roles',
                    'Options in India and abroad',
                    'Impact on policy and business decisions',
                ],
                'scope' => 'Government, RBI, research institutions, universities, banks, and consulting. Data and policy skills are highly valued.',
                'who_can_pursue' => 'Class 12 (Commerce or Science with Maths). Interest in current affairs, numbers, and logic. Higher studies improve prospects.',
                'what_you_get' => 'Economist, analyst, or researcher roles in policy, finance, or academia, with scope for influence and growth.',
            ],
        ];

        foreach ($careers as $data) {
            Career::updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true])
            );
        }
    }
}
