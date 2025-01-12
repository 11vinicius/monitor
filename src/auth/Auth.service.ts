import { HttpException, HttpStatus, Injectable } from '@nestjs/common';
import { PrismaService } from 'src/prismaService';
import { AuthDto } from './dto/Auth.dto';
import * as bcrypt from 'bcrypt';
import { JwtService } from '@nestjs/jwt';


@Injectable()
export class AuthService {

    constructor(
        private readonly jwtService: JwtService,
        private readonly prisma: PrismaService
    ) {}


    async signIn(creadentials: AuthDto) {
        try {
            const user = await  this.prisma.user.findUnique({
                where: {
                    email: creadentials.email
                }
            })
            const isMatch = await bcrypt.compare(creadentials.password, user.password);
            if(isMatch && user != null){
                const payload = { sub: user.id, username: user.name };
                return {
                    access_token: await this.jwtService.signAsync(payload),
                };
            }
            throw new HttpException('Email ou senha incorretos', HttpStatus.UNAUTHORIZED);
        } catch (error) {
            throw new HttpException('Email ou senha incorretos', HttpStatus.UNAUTHORIZED);
        }
    }
}
