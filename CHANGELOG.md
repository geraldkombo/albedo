# Changelog

Format based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

## [Unreleased] - 2026-03-16

### Added
- Complete `config/albedo.php` with all IPCC, UNFCCC, EPRA, NEMA, KPLC constants
- IPCC 2006 CH4 (33 kg/TJ) and N2O (3.2 kg/TJ) emission factors
- 8 database migrations (counties through charging_stations)
- MySQL GENERATED column for `net_reduction_co2e_tonnes`
- 8 Eloquent models with strict type casting
- `CarbonCalculator` service — IPCC Tier 1 baseline + UNFCCC project emissions
- `LeakageCalculator` service — AMS-III.C deduction rules (0%, 5%, 10%)
- `AdditionalityAssessor` service — Three-test evaluation
- `KncrReportGenerator` service — PCN/PDD PDF generation with NDC contribution
- EPRA Guidelines 2023 compliance fields
- NEMA KNCR 8-stage project lifecycle tracking
- Carbon Markets Regulations 2024 benefit sharing (25%)
- County seeder with all 47 Kenyan counties and coordinates
- KPLC E-Mobility Tariff integration (peak/off-peak)
