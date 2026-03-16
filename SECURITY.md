# Security Policy

## Reporting a Vulnerability

If you discover a security vulnerability in ALBEDO, please report it responsibly.

**Response SLA:** 48-hour acknowledgment

## Security Measures

### Authentication & Authorization
- Laravel Sanctum for API token management
- Role-based access control (fleet operators, validators, administrators)
- Audit logging for all carbon calculations and KNCR submissions

### Data Integrity
- MySQL foreign key constraints with `ON DELETE CASCADE`
- Database transactions for multi-table operations
- Source provenance tracked in `submission_json` field
- MySQL GENERATED column for `net_reduction_co2e_tonnes` (tamper-proof)

### Regulatory Compliance
- EPRA Section 12.3: Open API data fields validated
- EPRA Section 9.2: Metering accuracy +/-5% enforced in schema
- Carbon Markets Regulations 2024: Benefit sharing >=25% enforced as DB default
- NEMA KNCR: 8-stage lifecycle status tracking

### Infrastructure
- HTTPS enforced for all endpoints
- Environment variables for all secrets (`.env`)
- No secrets committed to repository (`.gitignore`)
