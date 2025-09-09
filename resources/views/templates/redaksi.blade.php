{{-- resources/views/redaksi.blade.php --}}
@php
    // Semua data hardcode di sini (tidak dari controller)
    $companyName = 'PT. Barokah Onpers Sejahtera';
    $address =
        'Menara 165 Lt.14 Unit E, Jl. TB Simatupang No. Kav. 1, Cilandak Timur, Pasar Minggu, Jakarta Selatan 12560';
    $email = 'support@onpers.co.id';
    $phone = '+62 21 1234567';
    $whatsappE164 = '6281322258387'; // untuk wa.me (tanpa +)
    $website = 'https://onpers.co.id';
    $nib = '0506240073939';
    $waLink = 'https://wa.me/' . $whatsappE164 . '?text=' . urlencode('Halo Redaksi OnPers');

    $pimpinan = ['Agus Mansur'];
    $redaksi = ['Munib Anshori'];
    $developerIT = ['Muhammad Agiandi', 'Firman Saputra'];
    $supportingBiz = ['Muhammad Lukman Hakim'];
    $produkBisnis = ['Public Relations (PR)', 'Event Organizer (EO)', 'Developer IT (Web & Aplikasi)'];
@endphp
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Info Redaksi — {{ $companyName }}</title>

    {{-- Bootstrap & Icons (CDN) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f6f8fb
        }

        .page-title {
            font-weight: 800;
            letter-spacing: .2px
        }

        .section-card {
            border: 0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 6px 24px rgba(18, 38, 63, .06);
            margin-bottom: 18px
        }

        .section-head {
            padding: .9rem 1.1rem;
            color: #fff;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: .6rem
        }

        .section-body {
            padding: 1rem 1.25rem
        }

        .pill {
            display: inline-block;
            background: #eef2f7;
            border-radius: 999px;
            padding: .35rem .75rem;
            margin: .25rem 0;
            font-weight: 600
        }

        .icon-wrap {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(255, 255, 255, .25);
            display: flex;
            align-items: center;
            justify-content: center
        }

        .text-muted-2 {
            color: #6b7785
        }

        .brand-blue {
            background: #1475e1
        }

        .brand-green {
            background: #15a05d
        }

        .brand-teal {
            background: #1aa3a3
        }

        .brand-yellow {
            background: #f4b206
        }

        .brand-dark {
            background: #2f3747
        }

        .brand-slate {
            background: #5c6b7a
        }

        .list-check i {
            color: #15a05d;
            margin-right: .5rem
        }

        .kv {
            display: flex;
            gap: .5rem;
            margin: .25rem 0
        }

        .kv .k {
            min-width: 140px;
            color: #6b7785
        }

        .kv .v {
            font-weight: 600;
            color: #1c2430
        }
    </style>

    {{-- JSON-LD (News policy/SEO) --}}
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "NewsMediaOrganization",
    "name": "{{ $companyName }}",
    "url": "{{ $website }}",
    "email": "mailto:{{ $email }}",
    "telephone": "{{ $phone }}",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "{{ $address }}",
      "addressCountry": "ID"
    },
    "contactPoint": [{
      "@type": "ContactPoint",
      "contactType": "editorial",
      "telephone": "+{{ $whatsappE164 }}",
      "email": "{{ $email }}",
      "availableLanguage": ["id"]
    }]
  }
  </script>
</head>

<body>

    <section class="container py-4 py-md-5">

        <div class="mb-4">
            <h1 class="page-title h3 mb-1">Informasi Redaksi</h1>
            <div class="text-muted-2">Kepemilikan, struktur tim, legalitas, serta kontak resmi {{ $companyName }}.
            </div>
        </div>

        {{-- Pimpinan Perusahaan --}}
        <div class="card section-card">
            <div class="section-head brand-blue">
                <span class="icon-wrap"><i class="bi bi-building"></i></span>
                <span>Pimpinan Perusahaan</span>
            </div>
            <div class="section-body">
                @foreach ($pimpinan as $p)
                    <div class="pill"><i class="bi bi-person-badge me-1"></i>{{ $p }}</div>
                @endforeach
            </div>
        </div>

        {{-- Redaksi --}}
        <div class="card section-card">
            <div class="section-head brand-teal">
                <span class="icon-wrap"><i class="bi bi-journal-text"></i></span>
                <span>Redaksi</span>
            </div>
            <div class="section-body">
                @foreach ($redaksi as $r)
                    <div class="pill"><i class="bi bi-pencil-square me-1"></i>{{ $r }}</div>
                @endforeach
            </div>
        </div>

        {{-- Developer IT --}}
        <div class="card section-card">
            <div class="section-head brand-green">
                <span class="icon-wrap"><i class="bi bi-cpu"></i></span>
                <span>Developer IT</span>
            </div>
            <div class="section-body">
                @foreach ($developerIT as $d)
                    <div class="pill"><i class="bi bi-code-slash me-1"></i>{{ $d }}</div>
                @endforeach
            </div>
        </div>

        {{-- Supporting Bisnis --}}
        <div class="card section-card">
            <div class="section-head brand-yellow">
                <span class="icon-wrap"><i class="bi bi-people"></i></span>
                <span>Supporting Bisnis</span>
            </div>
            <div class="section-body">
                @foreach ($supportingBiz as $s)
                    <div class="pill"><i class="bi bi-briefcase me-1"></i>{{ $s }}</div>
                @endforeach
            </div>
        </div>

        {{-- Produk Bisnis --}}
        <div class="card section-card">
            <div class="section-head brand-dark">
                <span class="icon-wrap"><i class="bi bi-grid-1x2"></i></span>
                <span>Produk Bisnis</span>
            </div>
            <div class="section-body list-check">
                <ul class="mb-0">
                    @foreach ($produkBisnis as $item)
                        <li class="mb-1"><i class="bi bi-check2-circle"></i>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Legalitas Perusahaan --}}
        <div class="card section-card">
            <div class="section-head brand-slate">
                <span class="icon-wrap"><i class="bi bi-shield-check"></i></span>
                <span>Legalitas Perusahaan</span>
            </div>
            <div class="section-body">
                <div class="kv">
                    <div class="k">Nama Badan Usaha</div>
                    <div class="v">{{ $companyName }}</div>
                </div>
                <div class="kv">
                    <div class="k">NIB</div>
                    <div class="v">{{ $nib }}</div>
                </div>
                <div class="kv">
                    <div class="k">Alamat Kantor</div>
                    <div class="v">{{ $address }}</div>
                </div>
                {{-- Jika punya file NIB:
      <div class="mt-2">
        <a class="btn btn-sm btn-outline-primary" href="{{ url('storage/legal/NIB-ONPERS.pdf') }}" target="_blank">
          <i class="bi bi-file-earmark-pdf me-1"></i>Lihat NIB (PDF)
        </a>
      </div> --}}
            </div>
        </div>

        {{-- Kontak Resmi --}}
        <div class="card section-card">
            <div class="section-head brand-blue">
                <span class="icon-wrap"><i class="bi bi-telephone"></i></span>
                <span>Kontak Resmi</span>
            </div>
            <div class="section-body">
                <div class="kv">
                    <div class="k"><i class="bi bi-envelope me-1"></i>Email</div>
                    <div class="v"><a href="mailto:{{ $email }}">{{ $email }}</a></div>
                </div>
                <div class="kv">
                    <div class="k"><i class="bi bi-telephone me-1"></i>Telepon</div>
                    <div class="v"><a href="tel:{{ preg_replace('/\s+/', '', $phone) }}">{{ $phone }}</a>
                    </div>
                </div>
                <div class="kv">
                    <div class="k"><i class="bi bi-whatsapp me-1"></i>WhatsApp</div>
                    <div class="v">
                        <a class="btn btn-sm btn-success" target="_blank" rel="noopener" href="{{ $waLink }}">
                            <i class="bi bi-whatsapp me-1"></i>Chat Redaksi (+{{ $whatsappE164 }})
                        </a>
                    </div>
                </div>
                <div class="kv">
                    <div class="k"><i class="bi bi-globe2 me-1"></i>Website</div>
                    <div class="v"><a href="{{ $website }}" target="_blank"
                            rel="noopener">{{ $website }}</a></div>
                </div>
            </div>
        </div>

        <div class="text-muted-2 small mt-3">
            Terakhir diperbarui: {{ now('Asia/Jakarta')->format('d M Y H:i') }} WIB
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
