import { Module } from '@nestjs/common';
import { PrismaService } from 'src/prismaService';
import { AuthController } from './Auth.controller';
import { AuthService } from './Auth.service';
import { JwtModule, JwtService } from '@nestjs/jwt';

@Module({
  imports: [
    JwtModule.register({
      global: true, 
      secret: process.env.JWT_SECRET,
      signOptions: { expiresIn: '1h' }, 
    }),
  ],
  controllers: [AuthController],
  providers: [PrismaService, AuthService],
  exports: [ AuthService],
})
@Module({})
export class AuthModule {}
