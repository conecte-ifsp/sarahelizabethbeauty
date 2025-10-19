
// Seção Projetos

const projetos = [
    {
        imagem: "../assets/img/mulhersessao3.jpg",
        titulo: "Makeup",
        expert: "EXPERT EM",
        peles: "peles",
        descricao: "Negra, clara, mista e madura."
    },
    {
        imagem: "../assets/img/2mulhersessao3.jpg",
        titulo: "CABELEIREIRA",
        expert: " PENTEADOS",
        peles: "e tranças",
        descricao: "com acabamento impecávele  proteção para seus fio"
    }
];

let indice = 0;

const imgProjeto = document.getElementById("img-projetos");
const titulo = document.getElementById("titulo");
const expert = document.getElementById("expert");
const peles = document.getElementById("peles");
const descricao = document.getElementById("descricao");
const seta = document.getElementById("seta");

seta.addEventListener("click", () => {
    indice++;
    if(indice >= projetos.length) indice = 0;

    imgProjeto.src = projetos[indice].imagem; 
    titulo.textContent = projetos[indice].titulo;
    expert.textContent = projetos[indice].expert;
    peles.textContent = projetos[indice].peles;
    descricao.textContent = projetos[indice].descricao;
});



// Seleciona os elementos
const logoArea = document.getElementById("logo-area");
const sessaoSara = document.getElementById("sessao-sara");

// SVGs
const svgBranco = `
<svg  viewBox="0 0 43 85" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M40.4294 5.85595C40.4294 4.38562 40.954 1.3816 43 0H36.2035C38.2203 1.3816 38.774 4.38562 38.774 5.85595V13.4864C38.774 20.8951 32.0474 20.781 32.0474 20.781H29.7275C29.7275 20.781 23.0009 20.8888 23.0009 13.4864V12.6118C23.0009 11.1415 23.5256 8.13749 25.5715 6.75589H18.775C20.7918 8.13749 21.3455 11.1415 21.3455 12.6118V13.4864C21.3455 20.8951 14.619 20.781 14.619 20.781H10.9642C10.9642 20.781 4.23763 20.8888 4.23763 13.4864V5.85595C4.23763 4.38562 4.76223 1.3816 6.80819 0H0C1.5913 1.09007 2.26745 3.18782 2.47729 4.74687V33.2471C5.34513 32.062 7.81659 31.6564 10.5329 31.5296C5.06534 34.2167 1.33482 39.1601 1.33482 45.6625C1.33482 46.0301 1.33482 46.3533 1.3698 46.7209C2.1567 58.8447 22.284 63.3571 30.8117 70.0306C33.0908 71.8178 34.8512 74.2641 34.8512 76.2161C34.8512 77.8829 33.5396 79.1441 30.1006 79.2264H29.9141C23.5897 79.2264 7.57761 73.0853 5.33347 59.9031L1.43975 77.8005C5.85224 82.2748 13.5989 85 21.0832 85C31.5228 85 41.5486 79.7525 41.5486 66.8554C41.5486 53.9584 18.7283 49.8136 11.0167 42.6521C9.11061 40.8649 8.28874 39.2361 8.28874 37.9306C8.28874 35.5286 10.9059 34.0266 14.4266 34.0266C20.6752 34.0266 29.6926 38.7038 31.8959 51.398L41.3621 38.2158C38.3602 35.1674 35.0202 32.9619 31.587 31.5043C34.5947 31.5993 37.2352 31.9796 40.342 33.2471L40.4178 5.85595H40.4294Z" fill="white"/>
</svg>
`;

const svgColorido = `
<svg width="126" height="229" viewBox="0 0 126 229" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M118.468 15.7766C118.468 11.8154 120.005 3.72219 126 0H106.085C111.994 3.72219 113.617 11.8154 113.617 15.7766V36.334C113.617 56.2938 93.9065 55.9865 93.9065 55.9865H87.1086C87.1086 55.9865 67.3981 56.2768 67.3981 36.334V33.9778C67.3981 30.0166 68.9353 21.9234 74.9305 18.2012H55.015C60.9248 21.9234 62.5474 30.0166 62.5474 33.9778V36.334C62.5474 56.2938 42.8369 55.9865 42.8369 55.9865H32.1277C32.1277 55.9865 12.4172 56.2768 12.4172 36.334V15.7766C12.4172 11.8154 13.9545 3.72219 19.9496 0H0C4.66287 2.93677 6.64416 8.58835 7.25905 12.7886V89.5716C15.6625 86.3787 22.9044 85.2859 30.8638 84.9445C14.8426 92.1839 3.91135 105.502 3.91135 123.02C3.91135 124.01 3.91135 124.881 4.01383 125.871C6.31964 158.535 65.2973 170.691 90.2855 188.671C96.9638 193.486 102.122 200.076 102.122 205.335C102.122 209.826 98.279 213.223 88.2017 213.445H87.6552C69.1232 213.445 22.2041 196.9 15.6283 161.386L4.21879 209.604C17.1484 221.658 39.8479 229 61.7788 229C92.3693 229 121.747 214.863 121.747 180.116C121.747 145.37 54.8784 134.204 32.2814 114.91C26.6962 110.095 24.2879 105.707 24.2879 102.189C24.2879 95.7183 31.9569 91.6717 42.2733 91.6717C60.5832 91.6717 87.0061 104.273 93.4624 138.472L121.2 102.958C112.404 94.7451 102.617 88.8032 92.5571 84.8762C101.37 85.1323 109.108 86.1567 118.211 89.5716L118.434 15.7766H118.468Z" fill="url(#paint0_radial_408_21)"/>
<defs>
<radialGradient id="paint0_radial_408_21" cx="0" cy="0" r="1" gradientTransform="matrix(156.787 -53.4015 85.8926 252.008 -5.50682 149.111)" gradientUnits="userSpaceOnUse">
<stop stop-color="#BF96C2"/>
<stop offset="0.37" stop-color="#844984"/>
<stop offset="0.72" stop-color="#FB5763"/>
<stop offset="1" stop-color="#FE9055"/>
</radialGradient>
</defs>
</svg>
`;

// Cria elementos SVG dentro do logoArea
logoArea.innerHTML = svgBranco + svgColorido;

const svgBrancoEl = logoArea.children[0];
const svgColoridoEl = logoArea.children[1];

// Estiliza para animação
[svgBrancoEl, svgColoridoEl].forEach(svg => {
    svg.style.position = 'absolute';
     svg.style.right = '1%'; // margem direita
    svg.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
});

svgBrancoEl.style.opacity = '1';
svgBrancoEl.style.transform = 'scale(1)';
svgColoridoEl.style.opacity = '0';
svgColoridoEl.style.transform = 'scale(1.1)'; // leve zoom

// Offset para começar a troca um pouco antes da sessão
const offset = 120; // troca 100px antes da sessão

// Função para trocar logo com fade e zoom
function trocarLogo() {
    const rect = sessaoSara.getBoundingClientRect();

    if (rect.top <= offset && rect.bottom > 0) {
        svgBrancoEl.style.opacity = '0';
        svgBrancoEl.style.transform = 'scale(0.9)';
        svgColoridoEl.style.opacity = '1';
        svgColoridoEl.style.transform = 'scale(1)';
    } else {
        svgBrancoEl.style.opacity = '1';
        svgBrancoEl.style.transform = 'scale(1)';
        svgColoridoEl.style.opacity = '0';
        svgColoridoEl.style.transform = 'scale(1.1)';
    }
}

// Dispara ao scroll
window.addEventListener("scroll", trocarLogo);

// Troca logo ao carregar a página (caso já esteja na sessão)
trocarLogo();
