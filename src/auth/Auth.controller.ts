import { Body, Controller, Post, UseGuards } from '@nestjs/common';
import { AuthService } from './Auth.service';
import { AuthDto } from './dto/Auth.dto';
import { Public } from 'src/decorator/public.decorator';

@Controller('auth')
export class AuthController {

    constructor(private readonly authService: AuthService) {}
    @Public()
    @Post()
    signIn(@Body() body: AuthDto): Promise<{ access_token: string; }> {
       return this.authService.signIn(body);
    }
}
