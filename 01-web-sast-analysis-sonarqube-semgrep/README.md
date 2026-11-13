# Static Application Security Testing (SAST) – Web Applications

## Overview
This project demonstrates white-box Static Application Security Testing (SAST) on intentionally vulnerable web applications (**DVWA** and **OWASP Juice Shop**) to detect insecure cryptographic implementations before deployment[cite: 2, 3].

## Tools Used
- **SonarQube:** Automated static code analysis and quality gate evaluation[cite: 2, 3].
- **Semgrep (via Docker):** Fast, rule-based static analysis using custom YAML detection rules[cite: 2, 4, 5].

## Key Findings & Remediation

| Target App | Tool | Vulnerability | CWE / OWASP | Severity | Remediation |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **DVWA** | SonarQube | Use of AES encryption in **ECB mode** (`aes-128-ecb`)[cite: 2, 3] | CWE-327 / OWASP A02[cite: 3] | High[cite: 5] | Replace ECB with authenticated encryption modes such as **AES-GCM** or **AES-CBC** with random IVs. |
| **OWASP Juice Shop** | Semgrep | Obsolete cryptographic hash function (**MD5**) in `Gruntfile.js` and `lib/insecurity.ts`[cite: 4, 5] | CWE-328 / OWASP A02[cite: 5] | High[cite: 5] | Migrate hashing routines to **SHA-256** or **SHA-3** (and Argon2/bcrypt for passwords)[cite: 4]. |
| **OWASP Juice Shop** | Semgrep | Enabled Directory Listing / Indexing (`/ftp`, `/encryptionkeys`, `/support/logs`)[cite: 4] | CWE-548 / OWASP A05 | Medium | Disable `serveIndex` middleware on sensitive directories in production[cite: 4]. |

## Custom Semgrep Rule (`rules/custom-crypto-rules.yaml`)
A custom rule was authored and executed inside a Docker container to flag obsolete `MD5` and `SHA-1` usage across JavaScript/TypeScript codebases[cite: 5]:
```bash
docker run --rm -v "$(pwd):/src" returntocorp/semgrep semgrep scan --config="custom-crypto-rules.yaml"