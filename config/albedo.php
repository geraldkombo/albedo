<?php

return [
    'app' => [
        'name' => 'ALBEDO',
        'full_name' => 'ALBEDO - Kenya Carbon Intelligence Platform for E-Mobility',
        'url' => 'https://albedo.co.ke',
    ],

    'baseline' => [
        'fuel_efficiency_km_per_litre' => 35.0, // I2: GIZ Kenya Fleet Study
        'petrol_density_kg_per_litre' => 0.74, // S1: IPCC 2006 Vol.2 Table 1.2
        'petrol_emission_factor_kg_per_tj' => 69300, // S1: IPCC 2006 Vol.2 Table 3.2.1
        'petrol_ncv_tj_per_kg' => 0.04418, // S1: IPCC 2006 Vol.2 Table 1.2
        'petrol_energy_content_tj_per_litre' => 34.66e-6, // S1: IPCC 2006
        'simplified_emission_factor_kg_per_km' => 0.0595, // S1: IPCC 2006, cross-validated I2 GIZ
        'default_annual_km' => 15000, // I2: GIZ Kenya Fleet Study
        'annual_emission_tonnes' => 0.8925, // Calculated: 15,000 km x 0.0595
        'ch4_emission_factor_kg_per_tj' => 33, // IPCC 2006 Vol.2 Table 3.2.3 (4-stroke)
        'n2o_emission_factor_kg_per_tj' => 3.2, // IPCC 2006 Vol.2 Table 3.2.3 (4-stroke)
        'ch4_gwp' => 28, // IPCC AR5
        'n2o_gwp' => 265, // IPCC AR5
    ],

    'project' => [
        'ev_consumption_kwh_per_km' => 0.025, // I1: EMAK White Paper 2025
        'grid_cm_factor_tco2_per_mwh' => 0.3174, // S3: ASB0050-2020, Table 1
        'grid_om_factor_tco2_per_mwh' => 0.4999, // S3: ASB0050-2020 Operating Margin
        'grid_bm_factor_tco2_per_mwh' => 0.1350, // S3: ASB0050-2020 Build Margin
    ],

    'methodology' => [
        'primary' => 'AMS-III.C v16.0',
        'full_title' => 'Emission Reductions by Electric and Hybrid Vehicles',
        'version' => '16.0',
        'scope' => 'Small-scale, Sectoral Scope 7: Transport',
        'valid_from' => '2022-09-08',
        'source_url' => 'https://cdm.unfccc.int/methodologies/DB/HLO-H5R7J6M96A23TFECTQ1BVIE24CK',
        'ebike_clarification' => 'SSC833 (Oct 2022): e-bikes confirmed applicable',
        'taximoto_clarification' => 'SSC810 (Feb 2021): taxi motorbikes confirmed applicable',
        'successor' => 'VMR0014 (Verra active from July 2025)',
        'mandatory_for_new_projects_after' => '31 July 2026',
        'successor_url' => 'https://verra.org/methodologies/vmr0014',
        'deadline_note' => 'Projects under AMS-III.C v16.0 must complete validation by 31 July 2026',
    ],

    'ndc' => [
        'national_target_reduction_pct' => 32,
        'transport_baseline_mtco2e' => 21.0,
        'transport_target_reduction_mtco2e' => 3.46,
        'road_subsector_2019_mtco2e' => 12.09,
        'source' => 'Kenya NDC (Updated 2020), Kenya Energy Transition Investment Plan 2050',
    ],

    'crediting_period' => [
        'default_years' => 7,
        'max_renewals' => 2,
        'max_total_years' => 21,
        'source' => 'AMS-III.C v16.0 small-scale project crediting period rules',
    ],

    'charging_methods' => [
        'ec_meter' => [
            'label' => 'EC Meter (KPLC Dedicated Meter)',
            'data_quality' => 'ec_meter_verified',
            'audit_note' => 'Utility-grade evidence. KPLC billing record reconcilable.',
        ],
        'swap_station' => [
            'label' => 'Battery Swap Station (BaaS)',
            'data_quality' => 'station_verified',
            'audit_note' => 'Station UIN-logged per EPRA Guidelines 2023.',
        ],
        'home_charge' => [
            'label' => 'Home Charge (Standard Socket)',
            'data_quality' => 'self_reported',
            'audit_note' => 'Self-reported. Cross-check against KPLC receipts.',
        ],
        'public_charge' => [
            'label' => 'Public Charging Station',
            'data_quality' => 'station_verified',
            'audit_note' => 'Station-logged if EPRA-licensed.',
        ],
        'mixed' => [
            'label' => 'Mixed / Unknown',
            'data_quality' => 'estimated',
            'audit_note' => 'Default 0.025 kWh/km applied (EMAK 2025 White Paper).',
        ],
    ],

    'tariff' => [
        'peak_rate_ksh_per_kwh' => 16.00,
        'off_peak_rate_ksh_per_kwh' => 8.00,
        'default_off_peak_share' => 0.70,
        'default_peak_share' => 0.30,
        'source' => 'G3: KPLC E-Mobility Tariff',
    ],

    'carbon_pricing' => [
        'conservative_usd_per_tonne' => 10,
        'optimistic_usd_per_tonne' => 60,
        'default_usd_ksh_rate' => 129.00,
        'source' => 'Finance in Africa: Africa VCM 2024 (avoidance credits $6-10/tonne)',
        'disclaimer' => 'Illustrative. Actual prices vary by buyer, standard, and market conditions.',
    ],

    'benefit_sharing' => [
        'community_share_pct' => 25,
        'source' => 'L2: Carbon Markets Regulations 2024, Regulation 29',
        'note' => '25% of non-land-based project earnings must be allocated to local communities',
    ],

    'leakage' => [
        'vehicle_scrapped' => 0,
        'vehicle_resold' => 10,
        'vehicle_stored' => 0,
        'unknown' => 5,
        'source' => 'S4: AMS-III.C v16.0 conservative approach',
    ],

    'localization' => [
        'carbon_credit_label' => 'Carbon Credits (Hewa Kaa)',
        'hewa_kaa_note' => 'Hewa Kaa (Swahili for "carbon credits") introduced by CS Deborah Barasa at KNCR launch, February 2026',
    ],

    'market' => [
        'total_ice_motorcycles_kenya' => 2000000,
        'total_evs_registered_2025' => 39324,
        'electric_motorcycles_e2w' => 33000,
        'new_ev_share_2025' => 15.3,
        'battery_swap_stations_national' => 300,
        'new_ev_registrations_2025' => 25277,
        'total_motorcycle_sales_2025' => 168286,
    ],

    'epra' => [
        'guidelines_title' => 'Electric Vehicle Charging and Battery Swapping Infrastructure Guidelines, 2023',
        'effective_date' => '2023-09-01',
        'source_url' => 'https://www.epra.go.ke',
        'urban_grid_km' => 3,
        'highway_spacing_km' => 25,
        'heavy_duty_spacing_km' => 100,
        'metering_tolerance_pct' => 5.0,
        'licence_fee_ksh' => 10000,
        'licence_processing_days' => 60,
        'mandatory_api_fields' => [
            'unique_station_id', 'location', 'operator_name',
            'network_provider', 'station_status', 'access_info',
            'num_ports', 'connector_types', 'charging_level_per_port',
            'realtime_status', 'pricing_payment'
        ],
    ],

    'policy' => [
        'e_mobility_policy_title' => 'National Electric Mobility Policy, 2024',
        'source_url' => 'https://www.transport.go.ke',
    ],

    'sources' => [
        'L1' => ['name' => 'Climate Change Act, Cap 387A (2016, amended 2023)', 'url' => 'https://kenyalaw.org'],
        'L2' => ['name' => 'Carbon Markets Regulations 2024 (LN 84)', 'url' => 'https://kenyalaw.org'],
        'L5' => ['name' => 'EPRA Charging & Swap Guidelines 2023', 'url' => 'https://www.epra.go.ke'],
        'L7' => ['name' => 'Kenya NDC (Updated 2020)', 'url' => 'https://unfccc.int'],
        'S1' => ['name' => 'IPCC 2006 Guidelines Vol.2: Energy', 'url' => 'https://www.ipcc-nggip.iges.or.jp'],
        'S3' => ['name' => 'UNFCCC ASB0050-2020: Grid EF (Kenya)', 'url' => 'https://cdm.unfccc.int'],
        'S4' => ['name' => 'UNFCCC AMS-III.C v16.0', 'url' => 'https://cdm.unfccc.int'],
        'S8' => ['name' => 'Verra VMR0014', 'url' => 'https://verra.org'],
        'G1' => ['name' => 'NEMA KNCR Launch', 'url' => 'https://nema.go.ke'],
        'G2' => ['name' => 'NEMA Community Guide 2025', 'url' => 'https://nema.go.ke'],
        'G3' => ['name' => 'KPLC E-Mobility Tariff', 'url' => 'https://kplc.co.ke'],
        'G5' => ['name' => 'EPRA Bi-Annual Statistics', 'url' => 'https://www.epra.go.ke'],
        'A1' => ['name' => 'Mbutura et al. 2025: Nairobi Boda Dataset', 'url' => 'https://doi.org/10.1016/j.dib.2025.111805'],
        'I1' => ['name' => 'EMAK White Paper 2025', 'url' => 'https://emak.or.ke'],
        'I2' => ['name' => 'GIZ Kenya Fleet Study', 'url' => 'https://www.giz.de'],
    ],
];
