<?php
/**
 * Conference Static Data Model
 * Extracted directly from src/App.tsx to maintain 100% data fidelity
 */

return [
    'stats' => [],
    'highlights' => [
        'Interdisciplinary Research Presentation',
        'Seven Thematic Engineering Tracks',
        'Peer-Reviewed Technical Submissions',
        'Academic & Industry Knowledge Exchange',
    ],

    'tracks' => [
        [
            'trackNum' => 'Track 1',
            'title' => 'Sustainable Automotive Mobility, Electric Vehicles and Intelligent Transportation Systems',
            'icon' => '🚗',
            'topics' => [
                'Electric Vehicles & Hybrid Powertrains',
                'Intelligent Transportation Systems (ITS)',
                'Autonomous & Connected Vehicles',
                'Battery Management Systems & Charging Infrastructure',
                'Vehicle Dynamics & Aerodynamics for Efficiency',
                'Sustainable Automotive Materials & Recycling',
            ],
        ],
        [
            'trackNum' => 'Track 2',
            'title' => 'Intelligent Sustainable Manufacturing, Industrial Automation and Industry 5.0',
            'icon' => '🏭',
            'topics' => [
                'Industry 5.0 & Human-Centric Manufacturing',
                'Intelligent Automation & Smart Robotics',
                'Additive Manufacturing & Precision Engineering',
                'Green Manufacturing & Resource Efficiency',
                'Digital Twins in Manufacturing Operations',
                'Resilient & Sustainable Supply Chains',
            ],
        ],
        [
            'trackNum' => 'Track 3',
            'title' => 'Smart and Sustainable Materials, Infrastructure and Advanced Engineering Systems',
            'icon' => '🏗️',
            'topics' => [
                'Advanced Smart & Bio-Based Materials',
                'Resilient & Sustainable Infrastructure',
                'Intelligent & Net-Zero Built Environments',
                'Structural Health Monitoring & Non-Destructive Testing',
                'Smart Cities & Urban Systems Modeling',
                'Disaster-Resilient Engineering Systems',
            ],
        ],
        [
            'trackNum' => 'Track 4',
            'title' => 'Sustainable Energy Systems, Thermal Engineering and Renewable Energy Integration',
            'icon' => '⚡',
            'topics' => [
                'Renewable Energy Integration (Solar, Wind, Bioenergy)',
                'Advanced Thermal Engineering, HVAC & Heat Recovery',
                'Energy Storage Technologies & Microgrids',
                'Hydrogen Energy & Alternative Clean Fuels',
                'Decarbonization & Industrial Energy Efficiency',
                'Net-Zero Energy Systems & Policy',
            ],
        ],
        [
            'trackNum' => 'Track 5',
            'title' => 'Environmental Sustainability, Climate Resilience and Circular Economy',
            'icon' => '🌿',
            'topics' => [
                'Climate Change Mitigation & Adaptation Strategies',
                'Circular Economy Models & Life Cycle Assessment',
                'Industrial Waste Valorization & Recycling Technologies',
                'Air, Water & Soil Quality Engineering',
                'Carbon Capture, Utilization & Storage (CCUS)',
                'Ecological Conservation & Environmental Governance',
            ],
        ],
        [
            'trackNum' => 'Track 6',
            'title' => 'AI, Machine Learning and Data-Driven Technologies for Sustainable Engineering',
            'icon' => '🤖',
            'topics' => [
                'Artificial Intelligence & Machine Learning in Engineering',
                'Predictive Analytics & Data-Driven Modeling',
                'Deep Learning for Sustainable Systems',
                'Computer Vision & Automated Quality Inspection',
                'AI for Resource Optimization & Energy Efficiency',
                'Ethics, Governance & Trustworthy AI in Engineering',
            ],
        ],
        [
            'trackNum' => 'Track 7',
            'title' => 'Emerging Computing Technologies, Cybersecurity and Next-Generation Information Systems',
            'icon' => '💻',
            'topics' => [
                'Cybersecurity, Privacy & Critical Infrastructure Protection',
                'Cloud, Edge & High-Performance Computing',
                'Internet of Things (IoT) & Smart Connected Systems',
                'Cyber-Physical Systems & Distributed Networks',
                'Blockchain, Distributed Ledger & Digital Trust',
                'Quantum Computing & Next-Generation Computing Architectures',
            ],
        ],
    ],

    // Important Conference Dates (Official Schedule)
    'dates' => [
        ['label' => 'Paper Submission Deadline', 'date' => '15 January 2027',  'type' => 'deadline', 'status' => 'Official'],
        ['label' => 'Acceptance Notification',   'date' => '20 January 2027',  'type' => 'info',     'status' => 'Official'],
        ['label' => 'Camera-Ready Submission',   'date' => '30 January 2027',  'type' => 'info',     'status' => 'Official'],
        ['label' => 'Registration Deadline',     'date' => '20 February 2027', 'type' => 'special',  'status' => 'Official'],
        ['label' => 'Conference Dates',          'date' => '9–10 April 2027',  'type' => 'event',    'status' => 'Official'],
    ],

    // Keynote & Invited Speakers (Official Confirmed Lineup)
    'speakers_confirmed' => true,
    'speakers' => [
        [
            'name' => 'Yash Shukla',
            'designation' => 'Principal Researcher & Centre Head',
            'organization' => 'Centre for Advanced Research in Building Science and Energy (CARBSE), CRDF, CEPT University',
            'linkedin' => 'https://www.linkedin.com/in/yash-shukla-55587b107',
            'image' => 'assets/images/speakers/Yash Shukla.jpeg',
            'confirmed' => true,
        ],
        [
            'name' => 'Jyoutirmay Mathur',
            'designation' => 'Professor',
            'organization' => 'Malaviya National Institute of Technology (MNIT), Jaipur',
            'linkedin' => 'https://www.linkedin.com/in/jyotirmay-mathur-7488903',
            'image' => 'assets/images/speakers/Jyoutirmay Mathur.jpeg',
            'confirmed' => true,
        ],
        [
            'name' => 'Dr. Shantipal Ohol',
            'designation' => 'Associate Professor, Mechanical Engineering',
            'organization' => 'COEP Technological University, Pune',
            'linkedin' => 'https://www.linkedin.com/in/dr-shantipal-ohol-8547b620',
            'image' => 'assets/images/speakers/Shantipal Ohol.jpeg',
            'confirmed' => true,
        ],
        [
            'name' => 'Sahastrarashmi Pund',
            'designation' => 'Head – Intellectual Property Rights (IPR)',
            'organization' => 'Endurance Technologies Ltd.',
            'linkedin' => 'https://www.linkedin.com/in/sahastrarashmi-pund-3b6784a',
            'image' => 'assets/images/speakers/Sahastrarashmi Pund.jpeg',
            'confirmed' => true,
        ],
        [
            'name' => 'Sandeep Kumar',
            'designation' => 'Associate Professor',
            'organization' => 'Indian Institute of Technology Bombay (IIT Bombay)',
            'linkedin' => 'https://www.linkedin.com/in/sandeep-kumar-4ab72714',
            'image' => 'assets/images/speakers/Sandeep Kumar.jpeg',
            'confirmed' => true,
        ],
        [
            'name' => 'Milind Rane',
            'designation' => 'Institute Chair Professor',
            'organization' => 'Indian Institute of Technology Bombay (IIT Bombay)',
            'linkedin' => 'https://www.linkedin.com/in/milind-rane-85a1a314b',
            'image' => 'assets/images/speakers/Milind Rane.jpeg',
            'confirmed' => true,
        ],
        [
            'name' => 'Ashish Rakheja',
            'designation' => 'Managing Partner',
            'organization' => 'AEON Integrated Building Design Consultants LLP',
            'linkedin' => 'https://www.linkedin.com/in/ashish-rakheja-81a615105',
            'image' => 'assets/images/speakers/Ashish Rakheja.jpeg',
            'confirmed' => true,
        ],
        [
            'name' => 'Pankaj Dharkar',
            'designation' => 'President',
            'organization' => 'Pankaj Dharkar & Associates',
            'linkedin' => 'https://www.linkedin.com/in/pankaj-dharkar-5407989b',
            'image' => 'assets/images/speakers/Pankaj Dharkar.jpeg',
            'confirmed' => true,
        ],
        [
            'name' => 'Nishant Gupta',
            'designation' => 'Managing Director',
            'organization' => 'Degree Day Private Limited',
            'linkedin' => 'https://www.linkedin.com/in/nishant-gupta-bb17478',
            'image' => 'assets/images/speakers/Nishant Gupta.jpeg',
            'confirmed' => true,
        ],
        [
            'name' => 'Anna Pacak',
            'designation' => 'Research Associate',
            'organization' => 'International Institute of Refrigeration',
            'linkedin' => 'https://www.linkedin.com/in/anna-pacak-baa451108',
            'image' => 'assets/images/speakers/default user profile icon.jpg',
            'confirmed' => true,
        ],
        [
            'name' => 'Prasad Kokil',
            'designation' => 'Owner',
            'organization' => 'Sanjay Technoplast Pvt. Ltd.',
            'linkedin' => 'https://www.linkedin.com/in/prasad-kokil-8363a019',
            'image' => 'assets/images/speakers/default user profile icon.jpg',
            'confirmed' => true,
        ],
    ],

    'reg_fees' => [
        ['category' => 'Student / Researcher (SAARC)', 'early' => '₹4,750', 'spot' => '₹5,500'],
        ['category' => 'Faculty (SAARC)',              'early' => '₹8,500', 'spot' => '₹9,500'],
        ['category' => 'Industry (SAARC)',             'early' => '₹12,500', 'spot' => '₹13,500'],
        ['category' => 'International (Non-SAARC)',    'early' => '$400',   'spot' => '$450'],
        ['category' => 'Accompanying Person',          'early' => '$200',   'spot' => '$225'],
    ],

    // Publication Partners & Sponsors (Provisional State: Kept empty until formal agreements/approvals)
    'sponsors' => [],

    // Descriptive Industry Collaboration & Sponsorship Opportunities (Qualitative exploratory categories, no prices or tiers)
    'sponsorship_collaboration_areas' => [
        [
            'title' => 'Academic & Institutional Collaboration',
            'icon' => '🤝',
            'description' => 'Exploratory dialogue for academic, research, and professional organizations interested in supporting conference activities and sustainable engineering dialogues.',
            'engagement' => 'Exploratory discussions on institutional visibility, academic session support, and non-financial collaboration, subject to mutual agreement.',
        ],
        [
            'title' => 'Technical Track Collaboration',
            'icon' => '⚙️',
            'description' => 'Opportunities for technology and engineering organizations to explore collaborative engagement with thematic research tracks in mobility, manufacturing, materials, and energy.',
            'engagement' => 'Potential dialogue on industry-academic knowledge exchange and technical track interaction, pending formal review.',
        ],
        [
            'title' => 'Research Dissemination Support',
            'icon' => '📚',
            'description' => 'Exploratory engagement for academic societies and scholarly groups interested in supporting the academic dissemination of conference research.',
            'engagement' => 'Potential collaboration on scholarly visibility and research documentation support; formal publication arrangements remain subject to institutional approval.',
        ],
        [
            'title' => 'Student & Scholar Engagement',
            'icon' => '🏆',
            'description' => 'Exploratory avenues to encourage student participation, youth innovation initiatives, and emerging researcher interaction.',
            'engagement' => 'Potential opportunities to support student technical engagement; award frameworks and recognition models are exploratory and subject to committee approval.',
        ],
    ],

    'scopes' => [
        'Sustainable Automotive Mobility, Electric Vehicles & Powertrain Innovations',
        'Intelligent Sustainable Manufacturing, Smart Robotics & Industry 5.0',
        'Smart and Sustainable Materials, Infrastructure & Advanced Engineering',
        'Sustainable Energy Systems, Thermal Engineering & Renewable Energy Integration',
        'Artificial Intelligence, Digital Technologies & Cyber-Physical Systems',
        'Environmental Sustainability, Climate Resilience & Circular Economy Models',
    ],

    'objectives' => [
        'Provide a premier international forum bringing together academia, automotive professionals, industry leaders, and researchers to share breakthroughs in intelligent engineering and sustainable technologies.',
        'Promote sustainable automotive mobility, electric vehicles, and intelligent transportation solutions supporting climate resilience and decarbonization goals.',
        'Advance the integration of Industry 5.0, Human-Centric Manufacturing, Artificial Intelligence, and Digital Technologies across diverse engineering domains.',
        'Foster active linkages and collaborative partnerships between academic institutions and global industries through joint research, circular economy models, and technological exchange.',
    ],

    'committee' => require __DIR__ . '/committee_members.php',

    'nav_links' => [
        ['label' => 'Home',            'target' => 'top',             'page' => 'home'],
        ['label' => 'About',           'target' => 'about',           'page' => 'home'],
        ['label' => 'Tracks',          'target' => 'tracks',          'page' => 'home'],
        ['label' => 'Abstract Submission', 'target' => 'abstract-submission', 'page' => 'abstract-submission'],
        ['label' => 'Speakers',        'target' => 'speakers',        'page' => 'home'],
        ['label' => 'Committee',       'target' => 'committee',       'page' => 'home'],
        ['label' => 'Sponsor',         'target' => 'sponsor',         'page' => 'sponsor'],
        ['label' => 'Terms & Conditions', 'target' => 'terms-and-conditions', 'page' => 'terms-and-conditions'],
        ['label' => 'Registration',    'target' => 'fees',            'page' => 'abstract-submission'],
        ['label' => 'Venue',           'target' => 'venue',           'page' => 'home'],
    ]
];
