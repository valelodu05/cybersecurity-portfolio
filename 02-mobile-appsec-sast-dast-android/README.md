
# Android Mobile Application Security Assessment (SAST & DAST)

## Overview
A comprehensive static and dynamic security evaluation of a flagship Android VPN client conducted within the scope of responsible Bug Bounty research[cite: 23, 24]. The assessment combines binary inspection with runtime instrumentation to uncover vulnerabilities classified under **OWASP Mobile Top 10 (2024)** and **CVSS v3**[cite: 23, 24].

## Methodology & Stack
- **Static Analysis (SAST):** Binary decompilation, manifest auditing, and code pattern analysis using **Mobile Security Framework (MobSF)**[cite: 27].
- **Dynamic Analysis (DAST):** Real-time method hooking, memory inspection, and traffic interception on an Android Emulator using **Frida 17.9.10**[cite: 27, 36].

## Consolidated Findings

| ID | Methodology | Finding | Classification | Severity |
| :--- | :--- | :--- | :--- | :--- |
| **H-01** | SAST | Insecure custom `TrustManager` accepting all SSL/TLS certificates[cite: 30, 32] | OWASP M5 / CWE-295[cite: 30] | High[cite: 30] |
| **H-02** | SAST | Missing `assetlinks.json` verification enabling App Link Hijacking[cite: 30, 33] | OWASP M8[cite: 30] | High[cite: 30] |
| **H-03** | SAST | Local configuration created with `MODE_WORLD_READABLE` permissions[cite: 30, 34] | OWASP M9 / CWE-276[cite: 30, 34] | High[cite: 30] |
| **H-04** | SAST | Unparameterized `rawQuery` calls in internal SQLite database[cite: 30, 35] | OWASP M4 / CWE-89[cite: 30] | Medium[cite: 30] |
| **H-05** | DAST | OAuth access/refresh tokens and MQTT credentials exposed in memory[cite: 30, 36] | OWASP M1[cite: 30] | High[cite: 30] |
| **H-06** | DAST | Real-time interception of internal API and CDN endpoints via `java.net.URL` hooks[cite: 30, 37, 38] | OWASP M5[cite: 30] | High[cite: 30] |
| **H-07** | DAST | Unencrypted sensitive state data intercepted in `SharedPreferences`[cite: 30, 39] | OWASP M9[cite: 30] | Medium[cite: 30] |

## Strategic Remediation
1. **Transport Security:** Enforce strict PKI certificate validation and implement SSL/TLS Certificate Pinning[cite: 18, 32].
2. **Secure Storage:** Migrate sensitive tokens and preferences to **Android Keystore** and `EncryptedSharedPreferences` using `Context.MODE_PRIVATE`[cite: 18, 34, 37].
3. **Runtime Hardening:** Integrate anti-instrumentation (Frida/root detection) and code obfuscation via R8/ProGuard[cite: 37, 40].