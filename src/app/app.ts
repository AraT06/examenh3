import { Component, OnDestroy, signal } from '@angular/core';

type CvData = {
  profile: {
    name: string;
    headline: string;
    roles: string[];
    summary: string;
    city: string;
    phone: string;
    email: string;
    university: string;
    semester: string;
    career: string;
    github: string;
    linkedin: string;
    profilePhoto: string;
    heroPhoto: string;
  };
  stats: { value: string; label: string }[];
  skills: { name: string; value: number }[];
  education: { title: string; period: string; institution: string; detail: string }[];
  experience: { title: string; period: string; institution: string; detail: string }[];
  projects: { title: string; category: string; description: string; tech: string[]; image: string; link: string }[];
  services: { title: string; description: string; icon: string }[];
  gallery: string[];
};

@Component({
  selector: 'app-root',
  templateUrl: './app.html',
  styleUrl: './app.css'
})
export class App implements OnDestroy {
  readonly cv = signal<CvData | null>(null);
  readonly activePhoto = signal(0);
  private carouselTimer?: ReturnType<typeof setInterval>;

  constructor() {
    fetch('/data/cv.json')
      .then((response) => response.json())
      .then((data: CvData) => {
        this.cv.set(data);
        this.carouselTimer = setInterval(() => this.nextPhoto(), 4200);
      });
  }

  ngOnDestroy() {
    if (this.carouselTimer) {
      clearInterval(this.carouselTimer);
    }
  }

  setPhoto(index: number) {
    this.activePhoto.set(index);
  }

  nextPhoto() {
    const gallery = this.cv()?.gallery ?? [];
    if (gallery.length === 0) {
      return;
    }

    this.activePhoto.update((current) => (current + 1) % gallery.length);
  }

  previousPhoto() {
    const gallery = this.cv()?.gallery ?? [];
    if (gallery.length === 0) {
      return;
    }

    this.activePhoto.update((current) => (current - 1 + gallery.length) % gallery.length);
  }
}
