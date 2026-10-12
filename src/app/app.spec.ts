import { TestBed } from '@angular/core/testing';
import { afterEach, vi } from 'vitest';
import { App } from './app';

describe('App', () => {
  const cvResponse = () => new Response(JSON.stringify({
    profile: {
      name: 'Aracely Michel Tito Barrancos',
      headline: 'Portafolio Angular',
      roles: ['Angular'],
      summary: 'Resumen',
      city: 'Cochabamba',
      phone: '+591 70756809',
      email: 'ara@example.com',
      university: 'UNIFRANZ',
      semester: 'Sexto semestre',
      career: 'Ingeniería de Sistemas',
      github: '#',
      linkedin: '#',
      profilePhoto: 'assets/fotos-ara/profile.jpeg',
      heroPhoto: 'assets/fotos-ara/hero.jpeg'
    },
    stats: [],
    skills: [],
    education: [],
    experience: [],
    projects: [],
    services: [],
    gallery: ['assets/fotos-ara/gallery-1.jpeg', 'assets/fotos-ara/gallery-2.jpeg']
  }));

  beforeEach(async () => {
    vi.spyOn(window, 'fetch').mockResolvedValue(cvResponse());

    await TestBed.configureTestingModule({
      imports: [App],
    }).compileComponents();
  });

  afterEach(() => {
    vi.restoreAllMocks();
  });

  it('should create the app', () => {
    const fixture = TestBed.createComponent(App);
    const app = fixture.componentInstance;
    expect(app).toBeTruthy();
  });

  it('should render portfolio title', async () => {
    const fixture = TestBed.createComponent(App);
    await fixture.whenStable();
    fixture.detectChanges();
    const compiled = fixture.nativeElement as HTMLElement;
    expect(compiled.querySelector('h1')?.textContent).toContain('Aracely Michel Tito Barrancos');
  });
});
