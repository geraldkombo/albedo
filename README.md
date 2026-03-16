# ALBEDO

**Kenya Carbon Intelligence Platform for E-Mobility**

[![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?logo=laravel)](https://laravel.com)
[![MySQL](https://img.shields.io/badge/MySQL-8-4479A1?logo=mysql&logoColor=white)](https://mysql.com)
[![TailwindCSS](https://img.shields.io/badge/Tailwind-3-06B6D4?logo=tailwindcss)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-Proprietary-red)]()

> Every calculation must trace to an official source. No estimates. No assumptions.

ALBEDO is a proprietary carbon accounting platform for Kenya's e-mobility sector. It calculates, aggregates, and registers carbon emission reductions from electric vehicle adoption using UNFCCC-approved methodologies with complete traceability to official sources.

## What ALBEDO Does

| Function | Method | Output |
|---|---|---|
| **Measures** | IPCC Tier 1 baseline vs UNFCCC grid-factored EV emissions (CO₂ + CH₄ + N₂O) | tCO₂e per vehicle |
| **Aggregates** | SACCO pooling with credit share splits and 25% community benefit | Fleet-level reductions |
| **Registers** | KNCR PCN/PDD draft matching NEMA's 8-stage project lifecycle | Submission-ready PDF |
| **Maps** | County charging gap analysis against EPRA density targets | Interactive Leaflet map |
| **Models** | EPRA tariff scenarios showing rider economics in KSh | Affordability scoring |
| **Complies** | EPRA UIN traceability, metering standards, open API compliance | Regulatory audit trail |

## Tech Stack

| Component | Technology |
|---|---|
| Backend | Laravel 11 |
| Database | MySQL 8 |
| Frontend | Blade + TailwindCSS 3 |
| Mapping | Leaflet.js |
| Charts | Chart.js |
| PDF | DOMPDF |
| Automation | n8n |

## Methodology Sources

| Code | Source | Used For |
|---|---|---|
| S1 | IPCC 2006 Vol.2 | CO₂, CH₄, N₂O emission factors |
| S3 | UNFCCC ASB0050-2020 | Kenya grid emission factor (0.3174 tCO₂/MWh) |
| S4 | AMS-III.C v16.0 | Methodology, leakage rules |
| L2 | Carbon Markets Regulations 2024 | Benefit sharing (25%), FPIC, CDA |
| L5 | EPRA Guidelines 2023 | Charging infrastructure compliance |
| G3 | KPLC E-Mobility Tariff | Peak/off-peak rates |
| I1 | EMAK White Paper 2025 | EV consumption (0.025 kWh/km) |
| I2 | GIZ Kenya Fleet Study | Fuel efficiency (35 km/L) |

## Quick Start

```bash
git clone https://github.com/geraldkombo/albedo.git
cd albedo
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=CountySeeder
php artisan serve
```

## Project Structure

```
albedo/
├── config/albedo.php                    # All official constants with source citations
├── database/
│   ├── migrations/                      # 8 migrations (counties → charging_stations)
│   └── seeders/CountySeeder.php         # 47 Kenyan counties
├── app/
│   ├── Models/                          # 8 Eloquent models
│   └── Services/                        # 4 business logic services
│       ├── CarbonCalculator.php         # IPCC Tier 1 + UNFCCC grid
│       ├── LeakageCalculator.php        # AMS-III.C deduction rules
│       ├── AdditionalityAssessor.php    # Three-test evaluation
│       └── KncrReportGenerator.php      # PCN/PDD PDF generation
└── resources/views/kncr/               # KNCR document templates
```

## Calculation Example (1 Vehicle, 1 Year)

```
Baseline (ICE):  15,000 km ÷ 35 km/L × 0.74 kg/L × 0.04418 TJ/kg × 69,300 kg/TJ ÷ 1000 = 0.9709 tCO₂e
Project (EV):    15,000 km × 0.025 kWh/km × 0.3174 tCO₂/MWh ÷ 1000           = 0.1190 tCO₂e
Gross Reduction: 0.9709 - 0.1190 = 0.8519 tCO₂e
Net (scrapped):  0.8519 × (1 - 0%) = 0.8519 tCO₂e
```

## System Architect

**Gerald Kombo** — System Architecture & Full-Stack Engineering

## License

Proprietary. See [LICENSE](LICENSE) for details.

---

*ALBEDO — the climate science measure of reflected solar radiation*
